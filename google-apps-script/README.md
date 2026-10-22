# Gmail Verification Relay

This Google Apps Script sends verification emails from your Gmail account. It avoids SMTP, so it works with the app's Render Free web service. Consumer Gmail sending quotas apply.

1. Open [Google Apps Script](https://script.google.com/) and create a new project.
2. Replace the editor contents with `Code.gs` from this folder.
3. In **Project Settings > Script properties**, add `VERIFICATION_RELAY_TOKEN`. Use a unique random value of at least 32 characters and keep it private.
4. Select `authorizeGmail` in the function menu and click **Run**. Approve the Gmail sending permission for your account.
5. Select **Deploy > New deployment > Web app**. Set **Execute as** to yourself and access to **Anyone**, then deploy and copy the web app URL ending in `/exec`.
6. In the Render service's **Environment** settings, set `GMAIL_RELAY_URL` to that URL and `GMAIL_RELAY_TOKEN` to the exact same token from step 3. Never commit the token or paste it into chat.
7. Save the environment changes and wait for Render to redeploy. Submit a registration using a Gmail address to test the code delivery.

The relay accepts only Gmail recipient addresses and rejects requests without the shared token. If Google Workspace policy does not offer **Anyone** access for the web app, use a verified email domain/provider or a paid host that permits Gmail SMTP instead.