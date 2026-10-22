function doPost(event) {
  try {
    const expectedToken = PropertiesService.getScriptProperties().getProperty('VERIFICATION_RELAY_TOKEN');
    const data = JSON.parse(event.postData.contents);

    if (!expectedToken || data.token !== expectedToken) {
      return jsonResponse({ ok: false });
    }

    if (!isGmailAddress(data.to) || !isShortString(data.subject, 160) || !isShortString(data.body, 4000)) {
      return jsonResponse({ ok: false });
    }

    MailApp.sendEmail(data.to, data.subject, data.body, {
      name: 'CEC Portfolio Craft',
    });

    return jsonResponse({ ok: true });
  } catch (error) {
    console.error(error);
    return jsonResponse({ ok: false });
  }
}

function isGmailAddress(value) {
  return typeof value === 'string' && /^[^@\s]+@gmail\.com$/i.test(value);
}

function isShortString(value, maximumLength) {
  return typeof value === 'string' && value.length > 0 && value.length <= maximumLength;
}

function jsonResponse(value) {
  return ContentService.createTextOutput(JSON.stringify(value))
    .setMimeType(ContentService.MimeType.JSON);
}

function authorizeGmail() {
  MailApp.getRemainingDailyQuota();
}