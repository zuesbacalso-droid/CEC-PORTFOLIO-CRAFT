<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CEC PORTFOLIO CRAFT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;600&family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,800;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        jakarta: ['Plus Jakarta Sans', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                        mono: ['Fira Code', 'monospace'],
                    },
                    colors: {
                        brand: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#2563eb',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#0b1220',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .creative-bg {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 50%, #ec4899 100%);
        }
        .creative-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(12px);
        }
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        @media print {
            .no-print { display: none !important; }
            .print-only { display: block !important; }
            body { background: white; }
        }

        /* CEC Portfolio Craft white-and-blue theme */
        :root { color-scheme: light; }
        body { background: #f4f8ff !important; }
        header { background: #ffffff !important; border-color: #dbeafe !important; color: #132647; }
        header nav button { color: #334155 !important; }
        header nav button:hover { color: #1d4ed8 !important; background: #eff6ff !important; }
        #view-home { background: radial-gradient(ellipse at 15% 15%, rgba(37,99,235,.12), transparent 36%), #f4f8ff !important; color: #132647; }
        #view-home h1 { color: #132647 !important; }
        #view-home p { color: #526581 !important; }
        #view-home .bg-white { background: #ffffff !important; border-color: #dbeafe !important; }
        #view-home h3 { color: #132647 !important; }
        #view-home footer { background: #ffffff !important; border-color: #dbeafe !important; color: #64748b !important; }
        .bg-sky-600, .hover\:bg-sky-700:hover { background-color: #2563eb !important; }
        .text-sky-600, .text-sky-700 { color: #2563eb !important; }
        .bg-sky-100 { background-color: #fee2e2 !important; }
        .text-sky-800 { color: #991b1b !important; }
        .focus\:ring-sky-500:focus { --tw-ring-color: #2563eb !important; }
        .focus\:border-sky-500:focus { border-color: #2563eb !important; }
        .creative-bg { background: linear-gradient(135deg, #1d4ed8 0%, #60a5fa 52%, #bfdbfe 100%) !important; }
        .creative-card { background: rgba(255,255,255,.96); }
        #view-form, #view-manage { color: #111827; }
        @media (max-width: 640px) { #view-home h1 { line-height: 1.08; } }
    /* Default light palette; dark mode preserves layout and adjusts contrast */
html:not(.dark-mode) body,html:not(.dark-mode) main{background:#f4f8ff!important}
html:not(.dark-mode) header{background:white!important}
html:not(.dark-mode) .bg-sky-600,html:not(.dark-mode) .bg-red-600{background:#2563eb!important}
html:not(.dark-mode) .text-sky-600,html:not(.dark-mode) .text-sky-700{color:#2563eb!important}
html.dark-mode body,html.dark-mode main{background:#080d19!important;color:#e8f1ff}
html.dark-mode header,html.dark-mode footer{background:#111c30!important;border-color:#334766!important}
html.dark-mode .bg-white{background:#15233a!important}
html.dark-mode .bg-slate-50,html.dark-mode .bg-slate-100{background:#202e45!important}
html.dark-mode .text-slate-900,html.dark-mode .text-slate-800,html.dark-mode .text-slate-700,html.dark-mode .text-slate-600{color:#e8f1ff!important}
html.dark-mode .text-slate-500{color:#c4d5f0!important}
html.dark-mode input,html.dark-mode textarea,html.dark-mode select{background:#23344f!important;color:white!important}
html.dark-mode .border-slate-200,html.dark-mode .border-slate-300{border-color:#415572!important}
button,a{transition:background-color .2s ease,color .2s ease,transform .2s ease,box-shadow .2s ease}
.step-pill{background:#dbeafe;color:#1d4ed8;border:2px solid #60a5fa;border-radius:999px;padding:8px 15px;font-weight:800}
.step-pill.active{background:#2563eb;color:white}
html.dark-mode button,a{transition:background-color .2s ease,color .2s ease,transform .2s ease,box-shadow .2s ease}
.step-pill{background:#1e3a8a;color:#fff}
</style>
</head>
<body class="h-full text-slate-800 antialiased flex flex-col font-sans">
   

    



<header class="no-print bg-white border-b border-slate-200 sticky top-0 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-between min-h-16 items-center gap-4 py-3">

            <!-- Logo and Website Name -->
            <a href="/dashboard" class="flex items-center gap-3 shrink-0 no-underline">
                <img
                    src="{{ asset('images/cec-logo.png') }}"
                    alt="CEC Portfolio Craft Logo"
                    class="h-10 w-10 object-contain"
                    onerror="this.alt='Logo not found'; this.classList.add('border','border-red-400');"
                >
                <span class="font-extrabold text-blue-600 text-sm sm:text-base">
                    CEC PORTFOLIO CRAFT
                </span>
            </a>

            <!-- Navigation -->
            <nav class="flex flex-wrap items-center justify-end gap-2 sm:gap-4">
                <button type="button" onclick="navigateTo('home')" id="nav-home"
                    class="px-3 py-2 rounded-lg text-sm font-semibold text-slate-600 hover:text-sky-600 hover:bg-slate-50 transition">
                    <i class="fa-solid fa-house mr-1.5"></i> Home
                </button>

                <button type="button" onclick="startNewPortfolio()" id="nav-create"
                    class="px-3 py-2 rounded-lg text-sm font-semibold text-slate-600 hover:text-sky-600 hover:bg-slate-50 transition">
                    <i class="fa-solid fa-plus-circle mr-1.5"></i> Create Portfolio
                </button>

                <button type="button" onclick="navigateTo('manage')" id="nav-manage"
                    class="px-3 py-2 rounded-lg text-sm font-semibold text-slate-600 hover:text-sky-600 hover:bg-slate-50 transition">
                    <i class="fa-solid fa-folder-open mr-1.5"></i> Saved Portfolios
                    <span id="saved-count-badge"
                        class="ml-1 px-1.5 py-0.5 text-xs bg-slate-200 text-slate-700 rounded-full font-bold">0</span>
                </button>

                <!-- Logout -->
                <form method="POST" action="{{ url('/logout') }}"
                    onsubmit="return confirm('Are you sure you want to log out?');">
                    @csrf
                    <button type="submit"
                        class="rounded-lg bg-red-600 hover:bg-red-700 text-white px-4 py-2 text-sm font-bold transition">
                        <i class="fa-solid fa-right-from-bracket mr-1.5"></i> <Logout>Logout</Logout>
                    </button>
                </form>
            </nav>

        </div>
    </div>
</header>





    <main class="flex-1">
        <section id="view-home" class="view-section min-h-[calc(100vh-4rem)] flex flex-col justify-between">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 flex-1 flex flex-col justify-center">
                <div class="text-center max-w-3xl mx-auto">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-sky-100 text-sky-800 mb-6">
                        <i class="fa-solid fa-sparkles"></i> DESIGN YOUR NEXT CHAPTER
                    </span>
                    <h1 class="text-4xl sm:text-6xl font-extrabold text-slate-900 tracking-tight font-jakarta mb-6 leading-tight">
                        Your work. <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 via-rose-500 to-blue-500">Your story.</span>
                    </h1>
                    <p class="text-lg text-slate-600 mb-8 leading-relaxed">
                        Enter your information once, choose from 3 unique customizable templates, and instantly generate, preview, save, or download image snapshot cards of your portfolio.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <button onclick="startNewPortfolio()" class="w-full sm:w-auto px-8 py-4 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl shadow-lg shadow-sky-500/25 transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-plus-circle"></i> Create New Portfolio
                        </button>
                        <button onclick="loadSampleAndCreate()" class="w-full sm:w-auto px-8 py-4 bg-white border border-slate-300 hover:border-slate-400 text-slate-700 font-bold rounded-xl shadow-sm transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-bolt text-amber-500"></i> Try With Demo Data
                        </button>
                    </div>
                </div>
                <div class="grid md:grid-cols-3 gap-8 mt-16 sm:mt-24">
                    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition">
                        <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-xl mb-4"><i class="fa-solid fa-database"></i></div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Persistent Database</h3>
                        <p class="text-sm text-slate-600">All your portfolio profiles are stored continuously. Edit, update, or remove them anytime with full CRUD functionality.</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition">
                        <div class="w-12 h-12 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center text-xl mb-4"><i class="fa-solid fa-palette"></i></div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">3 Distinct Designs</h3>
                        <p class="text-sm text-slate-600">Switch seamlessly between Simple Minimalist, Modern Grid, and Vibrant Creative layouts with one click.</p>
                    </div>
                    <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition">
                        <div class="w-12 h-12 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center text-xl mb-4"><i class="fa-solid fa-image"></i></div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Picture & PDF Generator</h3>
                        <p class="text-sm text-slate-600">Export your completed portfolio as a high-resolution PNG image badge or print a full vector PDF document.</p>
                    </div>
                </div>
            </div>
<div class="max-w-6xl mx-auto px-6 pb-10"><h2 class="text-center text-2xl font-black mb-6">Create your portfolio in three steps</h2><div class="flex flex-wrap justify-center gap-4"><span class="step-pill">1 · Enter Details</span><span class="step-pill">2 · Choose Template</span><span class="step-pill">3 · Preview & Share</span></div></div>
            <footer class="border-t border-slate-200 bg-white py-6 text-center text-sm text-slate-500">
                <p>© 2026 CEC PORTFOLIO CRAFT · Build a portfolio that feels like you.</p>
            </footer>
        </section>

        <section id="view-form" class="view-section hidden max-w-4xl mx-auto px-4 py-8">
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-200">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 font-jakarta" id="form-heading">Step 1: Enter Portfolio Details</h2>
                    <p class="text-sm text-slate-500">Fill in your professional experience, education, skills, and projects.</p>
                </div>
                <button type="button" onclick="loadSampleDataIntoForm()" class="text-xs bg-amber-50 hover:bg-amber-100 text-amber-800 font-semibold px-3 py-2 rounded-lg border border-amber-200 transition flex items-center gap-1.5">
                    <i class="fa-solid fa-wand-magic-sparkles"></i> Auto-Fill Demo
                </button>
            </div>

            <div class="flex flex-wrap gap-3 mb-6"><span class="step-pill active">1 · Details</span><span class="step-pill">2 · Template</span><span class="step-pill">3 · Preview</span></div><form id="portfolioForm"  onsubmit="handleFormSubmit(event)" class="space-y-8">
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                    <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2"><i class="fa-solid fa-user text-sky-600"></i> Personal Information</h3>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div><label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Full Name *</label><input type="text" id="fullName" pattern="[^0-9]*" title="Numbers are not allowed in a full name" required placeholder="e.g. Alex Morgan" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 outline-none text-sm transition"></div>
                        <div><label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Job Title / Role *</label><input type="text" id="jobTitle" pattern="[^0-9]*" title="Numbers are not allowed in a job title" required placeholder="e.g. Senior Frontend Developer" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 outline-none text-sm transition"></div>
                        <div><label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Email *</label><input type="email" id="email" required placeholder="alex@example.com" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 outline-none text-sm transition"></div>
                        <div><label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Contact Number</label><select id="countryCode" aria-label="Country calling code" class="px-3 py-2 rounded-lg border"><option value="+63">🇵🇭 Philippines (+63)</option><option value="+1">USA/Canada (+1)</option><option value="+44">UK (+44)</option><option value="+61">Australia (+61)</option><option value="+81">Japan (+81)</option><option value="+82">South Korea (+82)</option><option value="+65">Singapore (+65)</option><option value="+91">India (+91)</option></select><input type="tel" id="phone" inputmode="numeric" maxlength="11" pattern="[0-9]{0,11}" title="Enter up to 11 digits for a Philippine phone number" placeholder="09123456789"  class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 outline-none text-sm transition"></div>
                        <div class="sm:col-span-2"><label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Address / Location</label><input type="text" id="address" placeholder="San Francisco, CA, USA" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 outline-none text-sm transition"></div>
                        <div class="sm:col-span-2"><label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Profile Image URL</label><div class="flex gap-3 mb-2"><label><input type="radio" name="picMode" value="file" checked onchange="setPictureMode()"> Upload file</label><label><input type="radio" name="picMode" value="url" onchange="setPictureMode()"> Image URL</label></div><input type="file" id="profileFile" accept="image/png,image/jpeg,image/webp" onchange="loadProfileFile(this)" class="w-full mb-2"><input type="url" id="profilePic" style="display:none"  placeholder="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=400" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 outline-none text-sm transition"><p class="text-xs text-slate-400 mt-1">Leave blank for default avatar image.</p></div>
                        <div class="sm:col-span-2"><label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">About Me / Bio *</label><textarea id="aboutMe" rows="3" required placeholder="A brief summary of your background, passions, and goals..." class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 outline-none text-sm transition"></textarea></div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                    <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2"><i class="fa-solid fa-graduation-cap text-sky-600"></i> Educational Background</h3>
                    <div class="grid sm:grid-cols-3 gap-4">
                        <div><label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">School / University</label><input type="text" id="eduSchool" placeholder="Stanford University" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 outline-none text-sm"></div>
                        <div><label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Degree / Major</label><input type="text" id="eduDegree" placeholder="B.S. Computer Science" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 outline-none text-sm"></div>
                        <div><label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Year / Period</label><input type="text" id="eduYear" placeholder="2018 - 2022" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 outline-none text-sm"></div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                    <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2"><i class="fa-solid fa-code text-sky-600"></i> Skills (Comma Separated)</h3>
                    <div>
                        <input type="text" id="skillsInput" placeholder="JavaScript, React, Tailwind CSS, Node.js, UI/UX Design, Python" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 outline-none text-sm">
                        <p class="text-xs text-slate-400 mt-1">Separate skills with commas to create individual badges.</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2"><i class="fa-solid fa-diagram-project text-sky-600"></i> Featured Projects</h3>
                        <button type="button" onclick="addProjectRow()" class="text-xs bg-sky-50 text-sky-700 hover:bg-sky-100 font-bold px-3 py-1.5 rounded-lg transition border border-sky-200">+ Add Project</button>
                    </div>
                    <div id="projects-container" class="space-y-4"></div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2"><i class="fa-solid fa-briefcase text-sky-600"></i> Work Experience</h3>
                        <button type="button" onclick="addExperienceRow()" class="text-xs bg-sky-50 text-sky-700 hover:bg-sky-100 font-bold px-3 py-1.5 rounded-lg transition border border-sky-200">+ Add Experience</button>
                    </div>
                    <div id="experience-container" class="space-y-4"></div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                    <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2"><i class="fa-solid fa-globe text-sky-600"></i> Social & Web Links</h3>
                    <div class="grid sm:grid-cols-3 gap-4">
                        <div><label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1"><i class="fa-brands fa-github text-slate-800 mr-1"></i> GitHub URL</label><input type="url" id="socialGithub" placeholder="https://github.com/username" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 outline-none text-sm"></div>
                        <div><label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1"><i class="fa-brands fa-linkedin text-blue-600 mr-1"></i> LinkedIn URL</label><input type="url" id="socialLinkedin" placeholder="https://linkedin.com/in/username" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 outline-none text-sm"></div>
                        <div><label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1"><i class="fa-solid fa-link text-emerald-600 mr-1"></i> Website / Portfolio</label><input type="url" id="socialWebsite" placeholder="https://mywebsite.com" class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 outline-none text-sm"></div>
                    </div>
                </div>

                <div class="flex justify-end gap-4 pt-4">
                    <button type="button" onclick="navigateTo('home')" class="px-6 py-3 border border-slate-300 text-slate-700 font-semibold rounded-xl hover:bg-slate-100 transition">Cancel</button>
                    <button type="submit" class="px-8 py-3 bg-sky-600 hover:bg-sky-700 text-white font-bold rounded-xl shadow-lg shadow-sky-500/20 transition flex items-center gap-2">Save & Select Template <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </form>
        </section>

        <section id="view-templates" class="view-section hidden max-w-6xl mx-auto px-4 py-8">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-xs font-bold text-sky-600 uppercase tracking-widest">Step 2 of 3</span>
                <h2 class="text-3xl font-extrabold text-slate-900 font-jakarta mt-1">Choose Portfolio Template</h2>
                <p class="text-slate-600 text-sm mt-2">Select one of the three unique visual layouts. You can easily switch between them at any time!</p>
            </div>
            <div class="flex flex-wrap justify-center gap-3 mb-7"><span class="step-pill">✓ 1 · Details</span><span class="step-pill active">2 · Template</span><span class="step-pill">3 · Preview</span></div><div class="grid md:grid-cols-3 gap-8">
                <div onclick="selectTemplate('simple')" class="template-card border-2 border-slate-200 hover:border-sky-500 bg-white rounded-2xl p-6 cursor-pointer transition transform hover:-translate-y-1 hover:shadow-xl flex flex-col justify-between group">
                    <div>
                        <div class="h-44 bg-slate-100 rounded-xl mb-4 border border-slate-200 p-4 flex flex-col justify-between overflow-hidden relative">
                            <div class="w-12 h-12 rounded-full bg-slate-300 mb-2"></div>
                            <div class="space-y-1.5"><div class="w-3/4 h-3 bg-slate-400 rounded"></div><div class="w-1/2 h-2 bg-slate-300 rounded"></div><div class="w-full h-1.5 bg-slate-200 rounded"></div><div class="w-5/6 h-1.5 bg-slate-200 rounded"></div></div>
                            <span class="absolute top-3 right-3 text-xs bg-slate-200 text-slate-700 font-bold px-2 py-0.5 rounded">Classic</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-sky-600 transition">Template 1: Simple</h3>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">Clean, minimal single-column typography design. Perfect for corporate, academic, or traditional resumes.</p>
                    </div>
                    <button class="mt-6 w-full py-2.5 rounded-xl border border-sky-600 text-sky-600 font-bold text-sm group-hover:bg-sky-600 group-hover:text-white transition">Select Simple Design</button>
                </div>

                <div onclick="selectTemplate('modern')" class="template-card border-2 border-slate-200 hover:border-indigo-500 bg-white rounded-2xl p-6 cursor-pointer transition transform hover:-translate-y-1 hover:shadow-xl flex flex-col justify-between group">
                    <div>
                        <div class="h-44 bg-slate-900 rounded-xl mb-4 border border-slate-800 p-4 flex flex-col justify-between overflow-hidden relative">
                            <div class="flex items-center gap-2"><div class="w-8 h-8 rounded-lg bg-indigo-500"></div><div class="w-1/2 h-2.5 bg-slate-700 rounded"></div></div>
                            <div class="grid grid-cols-2 gap-2"><div class="h-10 bg-slate-800 rounded border border-slate-700"></div><div class="h-10 bg-slate-800 rounded border border-slate-700"></div></div>
                            <span class="absolute top-3 right-3 text-xs bg-indigo-500/20 text-indigo-300 font-bold px-2 py-0.5 rounded border border-indigo-500/30">Sleek Grid</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-indigo-600 transition">Template 2: Modern</h3>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">Sleek card-based layout featuring tech badges, dark/light contrast accents, and a dynamic developer portfolio look.</p>
                    </div>
                    <button class="mt-6 w-full py-2.5 rounded-xl border border-indigo-600 text-indigo-600 font-bold text-sm group-hover:bg-indigo-600 group-hover:text-white transition">Select Modern Design</button>
                </div>

                <div onclick="selectTemplate('creative')" class="template-card border-2 border-slate-200 hover:border-pink-500 bg-white rounded-2xl p-6 cursor-pointer transition transform hover:-translate-y-1 hover:shadow-xl flex flex-col justify-between group">
                    <div>
                        <div class="h-44 creative-bg rounded-xl mb-4 p-4 flex flex-col justify-between overflow-hidden relative shadow-inner">
                            <div class="w-10 h-10 rounded-2xl bg-white shadow-md"></div>
                            <div class="bg-white/90 p-2.5 rounded-xl space-y-1"><div class="w-2/3 h-2.5 bg-pink-500 rounded"></div><div class="w-full h-1.5 bg-slate-300 rounded"></div></div>
                            <span class="absolute top-3 right-3 text-xs bg-white/80 text-pink-700 font-bold px-2 py-0.5 rounded backdrop-blur">Vibrant</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-pink-600 transition">Template 3: Creative</h3>
                        <p class="text-xs text-slate-500 mt-2 leading-relaxed">Vibrant split-screen layout with colorful gradients, expressive typography, and stylized floating sections for designers and creators.</p>
                    </div>
                    <button class="mt-6 w-full py-2.5 rounded-xl border border-pink-600 text-pink-600 font-bold text-sm group-hover:bg-pink-600 group-hover:text-white transition">Select Creative Design</button>
                </div>
            </div>
        </section>

        <section id="view-preview" class="view-section hidden max-w-5xl mx-auto px-4 py-8">
            <div class="no-print bg-white p-4 rounded-2xl border border-slate-200 shadow-sm mb-8 flex flex-wrap items-center justify-between gap-4 sticky top-20 z-30">
                <div class="flex items-center space-x-2">
                    <button onclick="navigateTo('templates')" class="text-xs font-bold px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg transition flex items-center gap-1.5"><i class="fa-solid fa-arrow-left"></i> Change Template</button>
                    <button onclick="editCurrentPortfolio()" class="text-xs font-bold px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg transition flex items-center gap-1.5"><i class="fa-solid fa-pen"></i> Edit Info</button>
                </div>
                
                <div class="flex items-center space-x-2">
                    <div class="relative"><button type="button" onclick="document.getElementById('previewActionsMenu').classList.toggle('hidden')" class="text-xs font-bold px-3.5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-sm transition">⋯ Actions</button><div id="previewActionsMenu" class="hidden absolute right-0 mt-2 w-56 rounded-xl bg-white border border-slate-200 shadow-xl p-2 z-50"><button onclick="generatePortfolioPicture();document.getElementById('previewActionsMenu').classList.add('hidden')" class="w-full text-left px-3 py-2 rounded-lg hover:bg-blue-50 text-sm font-semibold text-slate-800"><i class="fa-solid fa-file-image mr-2 text-blue-600"></i>Export Portfolio Card</button><button onclick="window.print()" class="w-full text-left px-3 py-2 rounded-lg hover:bg-blue-50 text-sm font-semibold text-slate-800"><i class="fa-solid fa-print mr-2 text-blue-600"></i>Print / PDF</button></div></div>
                </div>
            </div>
            <div id="templateSavedIndicator" class="hidden mb-5 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-900"><div class="flex flex-wrap items-center justify-between gap-3"><div><p class="font-extrabold"><i class="fa-solid fa-circle-check mr-2"></i>Portfolio Already Saved!</p><p class="text-sm mt-1">Your portfolio and selected template have been saved successfully.</p></div><button type="button" onclick="navigateTo('manage')" class="rounded-lg bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm font-bold">Go to Saved Portfolios</button></div></div><div class="flex flex-wrap gap-3 mb-5"><span class="step-pill">✓ 1 · Details</span><span class="step-pill">✓ 2 · Template</span><span class="step-pill active">3 · Preview</span></div><button type="button" onclick="shareCurrentPortfolio()" class="mb-4 bg-blue-600 text-white font-bold px-4 py-2 rounded-lg">🔗 Copy shareable portfolio URL</button><div id="portfolio-output"  class="bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-200"></div>
        </section>

        <section id="view-manage" class="view-section hidden max-w-5xl mx-auto px-4 py-8">
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-200">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 font-jakarta">Manage Saved Portfolios</h2>
                    <p class="text-sm text-slate-500">View, edit, preview, or delete stored portfolios from the persistent database.</p>
                </div>
                <button onclick="startNewPortfolio()" class="px-4 py-2 bg-sky-600 hover:bg-sky-700 text-white font-bold text-sm rounded-xl shadow transition flex items-center gap-1.5"><i class="fa-solid fa-plus"></i> Create New</button>
            </div>
            <div id="manage-list-container" class="space-y-4"></div>
        </section>
    </main>

    <div id="pictureModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-2xl w-full p-6 shadow-2xl border border-slate-200 space-y-4">
            <div class="flex justify-between items-center pb-3 border-b border-slate-100">
                <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2"><i class="fa-solid fa-image text-emerald-600"></i> Generated Portfolio Card</h3>
                <button onclick="closePictureModal()" class="text-slate-400 hover:text-slate-600 text-lg"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <p class="text-xs text-slate-500">Your portfolio snapshot card has been rendered on an HTML5 canvas element below. Click "Download PNG" to save the image.</p>
            <div class="flex justify-center bg-slate-100 p-4 rounded-xl border border-slate-200 overflow-x-auto">
                <canvas id="exportCanvas" class="max-w-full h-auto shadow-md rounded-lg"></canvas>
            </div>
            <div class="flex justify-end gap-3 pt-2">
                <button onclick="closePictureModal()" class="px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-100 rounded-lg transition">Close</button>
                <a id="downloadCanvasBtn" download="portfolio-card.png" class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-lg shadow transition flex items-center gap-1.5"><i class="fa-solid fa-download"></i> Download PNG Image</a>
            </div>
        </div>
    </div>

    <div id="toast" class="fixed bottom-5 right-5 bg-slate-900 text-white px-4 py-3 rounded-xl shadow-2xl text-sm font-medium z-50 transform translate-y-20 opacity-0 transition-all duration-300 flex items-center gap-2">
        <i id="toast-icon" class="fa-solid fa-circle-check text-emerald-400"></i>
        <span id="toast-message">Notification message</span>
    </div>

    <script>
        let portfoliosDB = [];
        let currentPortfolio = null;
        let selectedTemplate = 'simple';

        const SAMPLE_DATA = {
            id: 'sample-101',
            fullName: 'Sarah Jenkins',
            jobTitle: 'Full-Stack Software Engineer',
            email: 'sarah.j@example.com',
            phone: '09171234567',
            address: 'Seattle, WA, USA',
            profilePic: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400',
            aboutMe: 'Passionate and results-driven engineer with 5+ years of experience crafting modern, scalable web applications. Dedicated to clean architecture, interactive user experiences, and robust cloud services.',
            eduSchool: 'University of Washington',
            eduDegree: 'B.S. Software Engineering',
            eduYear: '2016 - 2020',
            skills: ['React.js', 'Node.js', 'TypeScript', 'Tailwind CSS', 'PostgreSQL', 'GraphQL', 'AWS', 'Docker'],
            projects: [
                { title: 'CloudMetrics Dashboard', desc: 'Real-time analytics tool for cloud infrastructure monitoring.', link: 'https://github.com/sample/metrics' },
                { title: 'TaskFlow Workspace', desc: 'Collaborative task management tool with drag-and-drop Kanban boards.', link: 'https://github.com/sample/taskflow' }
            ],
            experience: [
                { company: 'TechNova Solutions', role: 'Senior Frontend Developer', duration: '2022 - Present', desc: 'Lead a team of 4 engineers in migrating monolithic app to React/TypeScript micro-frontends, boosting speed by 40%.' },
                { company: 'Apex Digital', role: 'Full-Stack Engineer', duration: '2020 - 2022', desc: 'Developed scalable RESTful APIs and modern frontend user interfaces using Node.js and React.' }
            ],
            socialGithub: 'https://github.com',
            socialLinkedin: 'https://linkedin.com',
            socialWebsite: 'https://example.com'
        };

        window.addEventListener('DOMContentLoaded', async () => {
            try {
                await loadPortfoliosFromServer();
            } catch (error) {
                showToast(error.message);
            }
            navigateTo('home');
        });

        async function apiRequest(url, method = 'GET', data = null) {
            const response = await fetch(url, {
                method,
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: data ? JSON.stringify(data) : null,
            });
            const result = await response.json().catch(() => ({}));
            if (!response.ok) {
                const validationMessage = Object.values(result.errors || {}).flat()[0];
                throw new Error(validationMessage || result.message || 'The request could not be completed.');
            }
            return result;
        }

        async function loadPortfoliosFromServer() {
            portfoliosDB = await apiRequest('/api/portfolios');
            updateSavedBadge();
        }

        function updateSavedBadge() {
            const badge = document.getElementById('saved-count-badge');
            if (badge) badge.innerText = portfoliosDB.length;
        }

        function navigateTo(viewName) {
            document.querySelectorAll('.view-section').forEach(sec => sec.classList.add('hidden'));
            const targetView = document.getElementById(`view-${viewName}`);
            if (targetView) targetView.classList.remove('hidden');
            ['home', 'form', 'manage'].forEach(nav => {
                const btn = document.getElementById(`nav-${nav}`);
                if (btn) {
                    if (nav === viewName) {
                        btn.classList.add('text-sky-600', 'bg-sky-50');
                        btn.classList.remove('text-slate-600');
                    } else {
                        btn.classList.remove('text-sky-600', 'bg-sky-50');
                        btn.classList.add('text-slate-600');
                    }
                }
            });
            if (viewName === 'manage') renderManageList();
            if (viewName === 'preview') { const indicator = document.getElementById('templateSavedIndicator'); if (indicator && currentPortfolio?.id && currentPortfolio?.template) indicator.classList.remove('hidden'); }
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function addProjectRow(data = { title: '', desc: '', link: '' }) {
            const container = document.getElementById('projects-container');
            const div = document.createElement('div');
            div.className = 'p-4 rounded-xl border border-slate-200 bg-slate-50 space-y-2 relative group';
            div.innerHTML = `
                <button type="button" onclick="this.parentElement.remove()" class="absolute top-2 right-2 text-slate-400 hover:text-red-500 text-xs font-bold p-1"><i class="fa-solid fa-trash"></i> Remove</button>
                <div class="grid sm:grid-cols-2 gap-2 pr-12">
                    <input type="text" placeholder="Project Title" value="${data.title || ''}" class="proj-title w-full px-3 py-1.5 rounded border border-slate-300 text-sm">
                    <input type="url" placeholder="Project Link (URL)" value="${data.link || ''}" class="proj-link w-full px-3 py-1.5 rounded border border-slate-300 text-sm">
                </div>
                <textarea placeholder="Brief description of the project..." rows="2" class="proj-desc w-full px-3 py-1.5 rounded border border-slate-300 text-sm">${data.desc || ''}</textarea>
            `;
            container.appendChild(div);
        }

        function addExperienceRow(data = { company: '', role: '', duration: '', desc: '' }) {
            const container = document.getElementById('experience-container');
            const div = document.createElement('div');
            div.className = 'p-4 rounded-xl border border-slate-200 bg-slate-50 space-y-2 relative';
            div.innerHTML = `
                <button type="button" onclick="this.parentElement.remove()" class="absolute top-2 right-2 text-slate-400 hover:text-red-500 text-xs font-bold p-1"><i class="fa-solid fa-trash"></i> Remove</button>
                <div class="grid sm:grid-cols-3 gap-2 pr-12">
                    <input type="text" placeholder="Company Name" value="${data.company || ''}" class="exp-company w-full px-3 py-1.5 rounded border border-slate-300 text-sm">
                    <input type="text" placeholder="Role / Position" value="${data.role || ''}" class="exp-role w-full px-3 py-1.5 rounded border border-slate-300 text-sm">
                    <input type="text" placeholder="Duration (e.g. 2021 - Present)" value="${data.duration || ''}" class="exp-duration w-full px-3 py-1.5 rounded border border-slate-300 text-sm">
                </div>
                <textarea placeholder="Key accomplishments and duties..." rows="2" class="exp-desc w-full px-3 py-1.5 rounded border border-slate-300 text-sm">${data.desc || ''}</textarea>
            `;
            container.appendChild(div);
        }

        function loadSampleDataIntoForm() {
            document.getElementById('fullName').value = SAMPLE_DATA.fullName;
            document.getElementById('jobTitle').value = SAMPLE_DATA.jobTitle;
            document.getElementById('email').value = SAMPLE_DATA.email;
            document.getElementById('phone').value = SAMPLE_DATA.phone;
            document.getElementById('address').value = SAMPLE_DATA.address;
            document.getElementById('profilePic').value = SAMPLE_DATA.profilePic;
            document.getElementById('aboutMe').value = SAMPLE_DATA.aboutMe;
            document.getElementById('eduSchool').value = SAMPLE_DATA.eduSchool;
            document.getElementById('eduDegree').value = SAMPLE_DATA.eduDegree;
            document.getElementById('eduYear').value = SAMPLE_DATA.eduYear;
            document.getElementById('skillsInput').value = SAMPLE_DATA.skills.join(', ');
            document.getElementById('socialGithub').value = SAMPLE_DATA.socialGithub;
            document.getElementById('socialLinkedin').value = SAMPLE_DATA.socialLinkedin;
            document.getElementById('socialWebsite').value = SAMPLE_DATA.socialWebsite;
            document.getElementById('projects-container').innerHTML = '';
            SAMPLE_DATA.projects.forEach(p => addProjectRow(p));
            document.getElementById('experience-container').innerHTML = '';
            SAMPLE_DATA.experience.forEach(e => addExperienceRow(e));
            showToast('Loaded demo data into form!');
        }

        async function loadSampleAndCreate() {
    try {
        const { id, ...sampleData } = SAMPLE_DATA;
        sampleData.template = selectedTemplate;
        currentPortfolio = await apiRequest('/api/portfolios', 'POST', sampleData);
                portfoliosDB.unshift(currentPortfolio);
                updateSavedBadge();
                navigateTo('templates');
                showToast('Demo portfolio created!');
            } catch (error) {
                showToast(error.message);
            }
        }

        async function handleFormSubmit(event) {
            event.preventDefault();
            const projects = [];
            document.querySelectorAll('#projects-container > div').forEach(div => {
                const title = div.querySelector('.proj-title')?.value.trim();
                const link = div.querySelector('.proj-link')?.value.trim();
                const desc = div.querySelector('.proj-desc')?.value.trim();
                if (title) projects.push({ title, link, desc });
            });
            const experience = [];
            document.querySelectorAll('#experience-container > div').forEach(div => {
                const company = div.querySelector('.exp-company')?.value.trim();
                const role = div.querySelector('.exp-role')?.value.trim();
                const duration = div.querySelector('.exp-duration')?.value.trim();
                const desc = div.querySelector('.exp-desc')?.value.trim();
                if (company || role) experience.push({ company, role, duration, desc });
            });
            const rawSkills = document.getElementById('skillsInput').value;
            const skills = rawSkills.split(',').map(s => s.trim()).filter(s => s.length > 0);
            const formData = {
                ...(currentPortfolio?.id ? { id: currentPortfolio.id } : {}),
                template: selectedTemplate,
                fullName: document.getElementById('fullName').value.trim(),
                jobTitle: document.getElementById('jobTitle').value.trim(),
                email: document.getElementById('email').value.trim(),
                phone: document.getElementById('phone').value.trim(),
                address: document.getElementById('address').value.trim(),
                profilePic: document.getElementById('profilePic').value.trim() || 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=400',
                aboutMe: document.getElementById('aboutMe').value.trim(),
                eduSchool: document.getElementById('eduSchool').value.trim(),
                eduDegree: document.getElementById('eduDegree').value.trim(),
                eduYear: document.getElementById('eduYear').value.trim(),
                skills: skills.length ? skills : ['JavaScript', 'Web Development'],
                projects,
                experience,
                socialGithub: document.getElementById('socialGithub').value.trim(),
                socialLinkedin: document.getElementById('socialLinkedin').value.trim(),
                socialWebsite: document.getElementById('socialWebsite').value.trim(),
            };
            try {
                const isEditing = Boolean(currentPortfolio?.id);
                const url = isEditing ? `/api/portfolios/${currentPortfolio.id}` : '/api/portfolios';
                currentPortfolio = await apiRequest(url, isEditing ? 'PUT' : 'POST', formData);
                const existingIdx = portfoliosDB.findIndex(p => p.id === currentPortfolio.id);
                if (existingIdx >= 0) portfoliosDB[existingIdx] = currentPortfolio;
                else portfoliosDB.unshift(currentPortfolio);
                updateSavedBadge();
                showToast('Portfolio information saved!');
                navigateTo('templates');
            } catch (error) {
                showToast(error.message);
            }
        }

        async function saveSelectedTemplate(tplName) {
    selectedTemplate = tplName;
    renderGeneratedPortfolio();

    if (!currentPortfolio || !currentPortfolio.id) {
        showToast('Please save your portfolio information first.');
        return;
    }

    try {
        const portfolioId = currentPortfolio.id;

        const updatedData = {
            ...currentPortfolio,
            template: tplName
        };

        const savedPortfolio = await apiRequest(
            `/api/portfolios/${portfolioId}`,
            'PUT',
            updatedData
        );

        currentPortfolio = savedPortfolio;

        const existingIdx = portfoliosDB.findIndex(
            portfolio => portfolio.id === savedPortfolio.id
        );

        if (existingIdx >= 0) {
            portfoliosDB[existingIdx] = savedPortfolio;
        } else {
            portfoliosDB.unshift(savedPortfolio);
        }

        updateSavedBadge();
        showToast(`${tplName.charAt(0).toUpperCase() + tplName.slice(1)} template saved!`);
        const savedIndicator = document.getElementById('templateSavedIndicator');
        if (savedIndicator) savedIndicator.classList.remove('hidden');

    } catch (error) {
        showToast('Could not save the selected template: ' + error.message);
        throw error;
    }
}

async function selectTemplate(tplName) {
    await saveSelectedTemplate(tplName);
    renderGeneratedPortfolio();
    navigateTo('preview');
}

async function switchTemplateInPreview(tplName) {
    await saveSelectedTemplate(tplName);
}

        function renderGeneratedPortfolio() {
            if (!currentPortfolio) currentPortfolio = SAMPLE_DATA;
            const container = document.getElementById('portfolio-output');
            const data = currentPortfolio;
            ['simple', 'modern', 'creative'].forEach(t => {
                const btn = document.getElementById(`btn-tpl-${t}`);
                if (btn) btn.className = t === selectedTemplate ? 'px-3 py-1.5 rounded-lg bg-white shadow text-slate-900 font-extrabold' : 'px-3 py-1.5 rounded-lg text-slate-500 hover:text-slate-900';
            });
            if (selectedTemplate === 'simple') container.innerHTML = renderSimpleTemplate(data);
            else if (selectedTemplate === 'modern') container.innerHTML = renderModernTemplate(data);
            else if (selectedTemplate === 'creative') container.innerHTML = renderCreativeTemplate(data);
        }

        function renderSimpleTemplate(d) {
            return `
                <div class="p-8 sm:p-12 max-w-4xl mx-auto space-y-10 text-slate-800 bg-white font-serif">
                    <div class="border-b border-slate-200 pb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6">
                        <div>
                            <h1 class="text-4xl sm:text-5xl font-bold tracking-tight text-slate-900">${escapeHTML(d.fullName)}</h1>
                            <p class="text-lg font-sans text-sky-700 font-semibold mt-1">${escapeHTML(d.jobTitle)}</p>
                            <div class="flex flex-wrap gap-4 font-sans text-xs text-slate-500 mt-3">
                                ${d.email ? `<span><i class="fa-solid fa-envelope mr-1"></i>${escapeHTML(d.email)}</span>` : ''}
                                ${d.phone ? `<span><i class="fa-solid fa-phone mr-1"></i>${escapeHTML(d.phone)}</span>` : ''}
                                ${d.address ? `<span><i class="fa-solid fa-location-dot mr-1"></i>${escapeHTML(d.address)}</span>` : ''}
                            </div>
                        </div>
                        <img src="${escapeHTML(d.profilePic)}" onerror="this.src='https://placehold.co/120x120/e2e8f0/475569?text=Profile'" alt="Profile" class="w-24 h-24 rounded-full object-cover border-2 border-slate-200 shadow-sm shrink-0">
                    </div>
                    <div class="font-sans"><h2 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">About Me</h2><p class="text-slate-700 leading-relaxed">${escapeHTML(d.aboutMe)}</p></div>
                    ${d.experience && d.experience.length ? `<div class="font-sans space-y-4"><h2 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Work Experience</h2><div class="space-y-6">${d.experience.map(exp => `<div><div class="flex justify-between items-baseline"><h3 class="font-bold text-slate-900">${escapeHTML(exp.role)} <span class="text-slate-400 font-normal">at ${escapeHTML(exp.company)}</span></h3><span class="text-xs text-slate-400">${escapeHTML(exp.duration)}</span></div><p class="text-sm text-slate-600 mt-1">${escapeHTML(exp.desc)}</p></div>`).join('')}</div></div>` : ''}
                    ${d.projects && d.projects.length ? `<div class="font-sans space-y-4"><h2 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Featured Projects</h2><div class="grid sm:grid-cols-2 gap-4">${d.projects.map(p => `<div class="p-4 rounded-xl border border-slate-100 bg-slate-50"><h3 class="font-bold text-slate-900 text-sm">${escapeHTML(p.title)}</h3><p class="text-xs text-slate-600 mt-1">${escapeHTML(p.desc)}</p>${p.link ? `<a href="${escapeHTML(p.link)}" target="_blank" class="inline-block mt-2 text-xs text-sky-600 font-semibold hover:underline">View Project →</a>` : ''}</div>`).join('')}</div></div>` : ''}
                    <div class="font-sans grid sm:grid-cols-2 gap-8 border-t border-slate-200 pt-8">
                        <div><h2 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">Education</h2><p class="font-bold text-slate-900 text-sm">${escapeHTML(d.eduDegree || 'Degree Details')}</p><p class="text-xs text-slate-600">${escapeHTML(d.eduSchool || '')} • ${escapeHTML(d.eduYear || '')}</p></div>
                        <div><h2 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-2">Skills</h2><div class="flex flex-wrap gap-1.5">${d.skills.map(s => `<span class="px-2.5 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-md">${escapeHTML(s)}</span>`).join('')}</div></div>
                    </div>
                </div>
            `;
        }

        function renderModernTemplate(d) {
            return `
                <div class="bg-slate-950 text-slate-100 min-h-full font-jakarta p-6 sm:p-10">
                    <div class="bg-slate-900 rounded-3xl p-6 sm:p-8 border border-slate-800 shadow-2xl flex flex-col md:flex-row items-center gap-8 mb-8">
                        <img src="${escapeHTML(d.profilePic)}" onerror="this.src='https://placehold.co/150x150/1e293b/ffffff?text=User'" alt="Profile" class="w-32 h-32 rounded-2xl object-cover border-2 border-indigo-500 shadow-lg shadow-indigo-500/20">
                        <div class="flex-1 text-center md:text-left space-y-2">
                            <span class="px-3 py-1 bg-indigo-500/10 border border-indigo-500/30 text-indigo-400 rounded-full text-xs font-bold uppercase tracking-wider">Available for Hire</span>
                            <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">${escapeHTML(d.fullName)}</h1>
                            <p class="text-indigo-400 font-semibold text-lg">${escapeHTML(d.jobTitle)}</p>
                            <p class="text-slate-400 text-sm max-w-2xl pt-1">${escapeHTML(d.aboutMe)}</p>
                            <div class="flex flex-wrap justify-center md:justify-start gap-4 text-xs text-slate-400 pt-3">
                                ${d.email ? `<span class="flex items-center gap-1.5 bg-slate-800/80 px-3 py-1.5 rounded-lg border border-slate-700"><i class="fa-solid fa-envelope text-indigo-400"></i> ${escapeHTML(d.email)}</span>` : ''}
                                ${d.address ? `<span class="flex items-center gap-1.5 bg-slate-800/80 px-3 py-1.5 rounded-lg border border-slate-700"><i class="fa-solid fa-location-dot text-indigo-400"></i> ${escapeHTML(d.address)}</span>` : ''}
                            </div>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="space-y-6">
                            <div class="bg-slate-900 p-6 rounded-2xl border border-slate-800"><h3 class="text-sm font-extrabold uppercase tracking-wider text-indigo-400 mb-4 flex items-center gap-2"><i class="fa-solid fa-code"></i> Tech Stack</h3><div class="flex flex-wrap gap-2">${d.skills.map(s => `<span class="px-3 py-1.5 bg-slate-800 border border-slate-700 text-indigo-200 text-xs font-semibold rounded-lg shadow-sm">${escapeHTML(s)}</span>`).join('')}</div></div>
                            <div class="bg-slate-900 p-6 rounded-2xl border border-slate-800"><h3 class="text-sm font-extrabold uppercase tracking-wider text-indigo-400 mb-4 flex items-center gap-2"><i class="fa-solid fa-graduation-cap"></i> Education</h3><div class="space-y-1"><p class="font-bold text-white text-sm">${escapeHTML(d.eduDegree || '')}</p><p class="text-xs text-slate-400">${escapeHTML(d.eduSchool || '')}</p><p class="text-xs text-indigo-400 font-mono mt-1">${escapeHTML(d.eduYear || '')}</p></div></div>
                            <div class="bg-slate-900 p-6 rounded-2xl border border-slate-800"><h3 class="text-sm font-extrabold uppercase tracking-wider text-indigo-400 mb-4 flex items-center gap-2"><i class="fa-solid fa-link"></i> Social Links</h3><div class="space-y-2 text-xs">${d.socialGithub ? `<a href="${escapeHTML(d.socialGithub)}" target="_blank" class="flex items-center gap-2 text-slate-300 hover:text-indigo-400"><i class="fa-brands fa-github text-base"></i> GitHub Profile</a>` : ''}${d.socialLinkedin ? `<a href="${escapeHTML(d.socialLinkedin)}" target="_blank" class="flex items-center gap-2 text-slate-300 hover:text-indigo-400"><i class="fa-brands fa-linkedin text-base"></i> LinkedIn Profile</a>` : ''}${d.socialWebsite ? `<a href="${escapeHTML(d.socialWebsite)}" target="_blank" class="flex items-center gap-2 text-slate-300 hover:text-indigo-400"><i class="fa-solid fa-globe text-base"></i> Personal Website</a>` : ''}</div></div>
                        </div>
                        <div class="md:col-span-2 space-y-6">
                            ${d.experience && d.experience.length ? `<div class="bg-slate-900 p-6 rounded-2xl border border-slate-800"><h3 class="text-sm font-extrabold uppercase tracking-wider text-indigo-400 mb-6 flex items-center gap-2"><i class="fa-solid fa-briefcase"></i> Work Experience</h3><div class="space-y-6">${d.experience.map(exp => `<div class="border-l-2 border-indigo-500/50 pl-4 space-y-1 relative"><div class="flex justify-between items-start"><h4 class="font-bold text-white text-base">${escapeHTML(exp.role)}</h4><span class="text-xs px-2.5 py-0.5 rounded-full bg-slate-800 text-slate-400 border border-slate-700">${escapeHTML(exp.duration)}</span></div><p class="text-xs text-indigo-400 font-semibold">${escapeHTML(exp.company)}</p><p class="text-xs text-slate-400 leading-relaxed pt-1">${escapeHTML(exp.desc)}</p></div>`).join('')}</div></div>` : ''}
                            ${d.projects && d.projects.length ? `<div class="bg-slate-900 p-6 rounded-2xl border border-slate-800"><h3 class="text-sm font-extrabold uppercase tracking-wider text-indigo-400 mb-6 flex items-center gap-2"><i class="fa-solid fa-rocket"></i> Featured Projects</h3><div class="grid sm:grid-cols-2 gap-4">${d.projects.map(p => `<div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/60 flex flex-col justify-between"><div><h4 class="font-bold text-white text-sm">${escapeHTML(p.title)}</h4><p class="text-xs text-slate-400 mt-1">${escapeHTML(p.desc)}</p></div>${p.link ? `<a href="${escapeHTML(p.link)}" target="_blank" class="mt-3 text-xs text-indigo-400 hover:text-indigo-300 font-bold flex items-center gap-1">Link <i class="fa-solid fa-external-link text-[10px]"></i></a>` : ''}</div>`).join('')}</div></div>` : ''}
                        </div>
                    </div>
                </div>
            `;
        }

        function renderCreativeTemplate(d) {
            return `
                <div class="bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-800 text-white p-6 sm:p-12 font-sans">
                    <div class="creative-card text-slate-900 rounded-3xl p-8 sm:p-10 shadow-2xl mb-10 relative overflow-hidden">
                        <div class="flex flex-col md:flex-row items-center gap-8 relative z-10">
                            <img src="${escapeHTML(d.profilePic)}" onerror="this.src='https://placehold.co/160x160/ec4899/ffffff?text=Artist'" alt="Creative Profile" class="w-36 h-36 rounded-3xl object-cover shadow-2xl border-4 border-white transform -rotate-3 hover:rotate-0 transition">
                            <div class="text-center md:text-left">
                                <span class="bg-pink-100 text-pink-700 text-xs font-black uppercase px-3 py-1 rounded-full tracking-wider">Creative Mind</span>
                                <h1 class="text-4xl sm:text-5xl font-black text-slate-900 mt-2 tracking-tight">${escapeHTML(d.fullName)}</h1>
                                <p class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">${escapeHTML(d.jobTitle)}</p>
                                <p class="text-slate-600 text-sm mt-3 max-w-xl leading-relaxed">${escapeHTML(d.aboutMe)}</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="space-y-8">
                            <div class="creative-card text-slate-900 rounded-3xl p-6 shadow-xl space-y-4"><h3 class="text-lg font-black text-slate-900 flex items-center gap-2"><i class="fa-solid fa-wand-magic-sparkles text-pink-500"></i> Superpowers</h3><div class="flex flex-wrap gap-2">${d.skills.map(s => `<span class="px-3 py-1.5 bg-gradient-to-r from-pink-500 to-purple-500 text-white text-xs font-bold rounded-xl shadow-sm">${escapeHTML(s)}</span>`).join('')}</div></div>
                            <div class="creative-card text-slate-900 rounded-3xl p-6 shadow-xl space-y-4"><h3 class="text-lg font-black text-slate-900 flex items-center gap-2"><i class="fa-solid fa-compass text-indigo-500"></i> Info & Location</h3><div class="text-xs space-y-2 text-slate-600"><p><strong>Education:</strong> ${escapeHTML(d.eduDegree || '')} (${escapeHTML(d.eduSchool || '')})</p><p><strong>Location:</strong> ${escapeHTML(d.address || 'Global')}</p><p><strong>Email:</strong> ${escapeHTML(d.email || '')}</p></div></div>
                        </div>
                        <div class="md:col-span-2 space-y-8">
                            ${d.projects && d.projects.length ? `<div class="creative-card text-slate-900 rounded-3xl p-6 sm:p-8 shadow-xl"><h3 class="text-xl font-black text-slate-900 mb-6 flex items-center gap-2"><i class="fa-solid fa-palette text-purple-600"></i> Featured Work</h3><div class="grid sm:grid-cols-2 gap-4">${d.projects.map(p => `<div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-md hover:shadow-xl transition"><h4 class="font-black text-slate-900 text-base">${escapeHTML(p.title)}</h4><p class="text-xs text-slate-600 mt-2">${escapeHTML(p.desc)}</p>${p.link ? `<a href="${escapeHTML(p.link)}" target="_blank" class="inline-block mt-3 text-xs bg-pink-500 hover:bg-pink-600 text-white px-3 py-1.5 rounded-lg font-bold transition">Explore Project</a>` : ''}</div>`).join('')}</div></div>` : ''}
                            ${d.experience && d.experience.length ? `<div class="creative-card text-slate-900 rounded-3xl p-6 sm:p-8 shadow-xl"><h3 class="text-xl font-black text-slate-900 mb-6 flex items-center gap-2"><i class="fa-solid fa-fire text-amber-500"></i> Experience Journey</h3><div class="space-y-6">${d.experience.map(exp => `<div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm space-y-2"><div class="flex justify-between items-center"><h4 class="font-bold text-slate-900 text-base">${escapeHTML(exp.role)}</h4><span class="text-xs font-black bg-purple-100 text-purple-700 px-2.5 py-1 rounded-full">${escapeHTML(exp.duration)}</span></div><p class="text-xs text-pink-600 font-bold">${escapeHTML(exp.company)}</p><p class="text-xs text-slate-600 leading-relaxed">${escapeHTML(exp.desc)}</p></div>`).join('')}</div></div>` : ''}
                        </div>
                    </div>
                </div>
            `;
        }

        function renderManageList() {
            const container = document.getElementById('manage-list-container');
            if (!container) return;
            if (portfoliosDB.length === 0) {
                container.innerHTML = `
                    <div class="bg-white p-12 text-center rounded-2xl border border-slate-200 shadow-sm space-y-4">
                        <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center text-slate-400 text-2xl mx-auto"><i class="fa-solid fa-folder-open"></i></div>
                        <h3 class="text-lg font-bold text-slate-800">No Portfolios Found</h3>
                        <p class="text-slate-500 text-sm max-w-sm mx-auto">You haven't saved any portfolio entries yet. Create one now or try with sample data.</p>
                        <button onclick="startNewPortfolio()" class="px-5 py-2.5 bg-sky-600 text-white font-bold text-sm rounded-xl shadow hover:bg-sky-700 transition">Create First Portfolio</button>
                    </div>
                `;
                return;
            }
            container.innerHTML = portfoliosDB.map(p => `
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="flex items-center space-x-4">
                        <img src="${escapeHTML(p.profilePic)}" onerror="this.src='https://placehold.co/100x100/e2e8f0/475569?text=User'" class="w-14 h-14 rounded-full object-cover border border-slate-200">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">${escapeHTML(p.fullName)}</h3>
                            <p class="text-sm text-sky-600 font-semibold">${escapeHTML(p.jobTitle)}</p>
                            <p class="text-xs text-slate-400 mt-1">${escapeHTML(p.email)} • ${(p.skills || []).slice(0, 3).join(', ')}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 w-full sm:w-auto justify-end border-t sm:border-0 pt-3 sm:pt-0">
                        <button onclick="viewPortfolioFromManage('${p.id}')" class="px-3 py-2 bg-sky-50 text-sky-700 hover:bg-sky-100 text-xs font-bold rounded-lg transition flex items-center gap-1"><i class="fa-solid fa-eye"></i> View</button>
                        <button onclick="editPortfolioFromManage('${p.id}')" class="px-3 py-2 bg-slate-100 text-slate-700 hover:bg-slate-200 text-xs font-bold rounded-lg transition flex items-center gap-1"><i class="fa-solid fa-pen"></i> Edit</button>
                        <button onclick="deletePortfolioFromManage('${p.id}')" class="px-3 py-2 bg-red-50 text-red-600 hover:bg-red-100 text-xs font-bold rounded-lg transition flex items-center gap-1"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                </div>
            `).join('');
        }

        function viewPortfolioFromManage(id) {
            const found = portfoliosDB.find(p => p.id === id);
            if (found) {
                currentPortfolio = found;
                renderGeneratedPortfolio();
                navigateTo('preview');
            }
        }

        function editPortfolioFromManage(id) {
            const found = portfoliosDB.find(p => p.id === id);
            if (found) {
                currentPortfolio = found;
                populateFormWithData(found);
                navigateTo('form');
            }
        }

        function editCurrentPortfolio() {
            if (currentPortfolio) {
                populateFormWithData(currentPortfolio);
                navigateTo('form');
            }
        }

        async function deletePortfolioFromManage(id) {
            if (confirm('Are you sure you want to delete this portfolio from the database?')) {
                try {
                    await apiRequest(`/api/portfolios/${id}`, 'DELETE');
                    portfoliosDB = portfoliosDB.filter(p => p.id !== id);
                    updateSavedBadge();
                    renderManageList();
                    showToast('Portfolio deleted successfully');
                } catch (error) {
                    showToast(error.message);
                }
            }
        }

        function startNewPortfolio() {
            currentPortfolio = null;
            document.getElementById('portfolioForm').reset();
            document.getElementById('form-heading').innerText = 'Step 1: Enter Portfolio Details';
            document.getElementById('projects-container').innerHTML = '';
            document.getElementById('experience-container').innerHTML = '';
            navigateTo('form');
        }

        function populateFormWithData(data) {
            document.getElementById('form-heading').innerText = 'Edit Portfolio Details';
            document.getElementById('fullName').value = data.fullName || '';
            document.getElementById('jobTitle').value = data.jobTitle || '';
            document.getElementById('email').value = data.email || '';
            document.getElementById('phone').value = data.phone || '';
            document.getElementById('address').value = data.address || '';
            document.getElementById('profilePic').value = data.profilePic || '';
            document.getElementById('aboutMe').value = data.aboutMe || '';
            document.getElementById('eduSchool').value = data.eduSchool || '';
            document.getElementById('eduDegree').value = data.eduDegree || '';
            document.getElementById('eduYear').value = data.eduYear || '';
            document.getElementById('skillsInput').value = (data.skills || []).join(', ');
            document.getElementById('socialGithub').value = data.socialGithub || '';
            document.getElementById('socialLinkedin').value = data.socialLinkedin || '';
            document.getElementById('socialWebsite').value = data.socialWebsite || '';
            const pContainer = document.getElementById('projects-container');
            pContainer.innerHTML = '';
            if (data.projects && data.projects.length) data.projects.forEach(p => addProjectRow(p));
            const eContainer = document.getElementById('experience-container');
            eContainer.innerHTML = '';
            if (data.experience && data.experience.length) data.experience.forEach(e => addExperienceRow(e));
        }

        function generatePortfolioPicture() {
            const d = currentPortfolio || SAMPLE_DATA;
            const canvas = document.getElementById('exportCanvas');
            const ctx = canvas.getContext('2d');
            canvas.width = 800;
            canvas.height = 500;
            const grad = ctx.createLinearGradient(0, 0, 800, 500);
            if (selectedTemplate === 'modern') {
                grad.addColorStop(0, '#0f172a');
                grad.addColorStop(1, '#1e1b4b');
            } else if (selectedTemplate === 'creative') {
                grad.addColorStop(0, '#4c1d95');
                grad.addColorStop(0.5, '#7e22ce');
                grad.addColorStop(1, '#be185d');
            } else {
                grad.addColorStop(0, '#2563eb');
                grad.addColorStop(1, '#1d4ed8');
            }
            ctx.fillStyle = grad;
            ctx.fillRect(0, 0, 800, 500);
            ctx.fillStyle = selectedTemplate === 'modern' ? 'rgba(30, 41, 59, 0.9)' : 'rgba(255, 255, 255, 0.95)';
            ctx.shadowColor = 'rgba(0, 0, 0, 0.25)';
            ctx.shadowBlur = 20;
            ctx.beginPath();
            ctx.roundRect(40, 40, 720, 420, 24);
            ctx.fill();
            ctx.shadowBlur = 0;
            const textColor = selectedTemplate === 'modern' ? '#ffffff' : '#0f172a';
            const subTextColor = selectedTemplate === 'modern' ? '#818cf8' : '#2563eb';
            ctx.fillStyle = textColor;
            ctx.font = 'bold 36px "Plus Jakarta Sans", sans-serif';
            ctx.fillText(d.fullName || 'User Name', 80, 110);
            ctx.fillStyle = subTextColor;
            ctx.font = 'bold 20px "Inter", sans-serif';
            ctx.fillText(d.jobTitle || 'Professional Role', 80, 145);
            ctx.fillStyle = selectedTemplate === 'modern' ? '#94a3b8' : '#475569';
            ctx.font = '14px "Inter", sans-serif';
            const shortBio = (d.aboutMe || '').substring(0, 90) + '...';
            ctx.fillText(shortBio, 80, 185);
            ctx.strokeStyle = selectedTemplate === 'modern' ? '#334155' : '#e2e8f0';
            ctx.lineWidth = 1;
            ctx.beginPath();
            ctx.moveTo(80, 215);
            ctx.lineTo(720, 215);
            ctx.stroke();
            ctx.fillStyle = textColor;
            ctx.font = 'bold 16px "Inter", sans-serif';
            ctx.fillText('CORE SKILLS', 80, 250);
            let skillX = 80;
            let skillY = 270;
            (d.skills || []).slice(0, 6).forEach(skill => {
                ctx.font = 'bold 12px "Inter", sans-serif';
                const metrics = ctx.measureText(skill);
                const badgeWidth = metrics.width + 24;
                if (skillX + badgeWidth > 720) {
                    skillX = 80;
                    skillY += 35;
                }
                ctx.fillStyle = selectedTemplate === 'modern' ? '#312e81' : '#dbeafe';
                ctx.beginPath();
                ctx.roundRect(skillX, skillY, badgeWidth, 26, 8);
                ctx.fill();
                ctx.fillStyle = selectedTemplate === 'modern' ? '#c7d2fe' : '#1d4ed8';
                ctx.fillText(skill, skillX + 12, skillY + 17);
                skillX += badgeWidth + 10;
            });
            ctx.fillStyle = selectedTemplate === 'modern' ? '#64748b' : '#94a3b8';
            ctx.font = '12px "Inter", sans-serif';
            ctx.fillText(`Email: ${d.email || 'N/A'}  |  Location: ${d.address || 'N/A'}`, 80, 420);
            ctx.fillStyle = subTextColor;
            ctx.font = 'bold 12px "Inter", sans-serif';
            ctx.fillText('Generated by PORTFOLIO CRAFT', 560, 420);
            const modal = document.getElementById('pictureModal');
            const downloadBtn = document.getElementById('downloadCanvasBtn');
            downloadBtn.href = canvas.toDataURL('image/png');
            modal.classList.remove('hidden');
        }

        function closePictureModal() {
            document.getElementById('pictureModal').classList.add('hidden');
        }

        function escapeHTML(str) {
            if (!str) return '';
            return str.replace(/[&<>"']/g, tag => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[tag] || tag));
        }

        function showToast(message) {
            const toast = document.getElementById('toast');
            const msgSpan = document.getElementById('toast-message');
            if (toast && msgSpan) {
                msgSpan.innerText = message;
                toast.classList.remove('translate-y-20', 'opacity-0');
                setTimeout(() => toast.classList.add('translate-y-20', 'opacity-0'), 3000);
            }
        }
    </script>
<script>
javascript

function updateThemeButton() {
    // Dark Mode toggle has been removed.
}

function toggleTheme() {
    // Always keep the website in light mode.
    document.documentElement.classList.remove('dark-mode', 'dark');

    if (document.body) {
        document.body.classList.remove('dark-mode', 'dark');
    }

    localStorage.setItem('cec-theme', 'light');
}

// Apply light mode when the page loads.
document.documentElement.classList.remove('dark-mode', 'dark');
localStorage.setItem('cec-theme', 'light');

document.addEventListener('DOMContentLoaded', function () {
    document.body.classList.remove('dark-mode', 'dark');
});


// Apply the saved theme without accidentally toggling it.
(function initializeTheme() {
    const savedTheme = localStorage.getItem('cec-theme');

    if (savedTheme === 'dark') {
        document.documentElement.classList.add('dark-mode');
    } else {
        document.documentElement.classList.remove('dark-mode');
        localStorage.setItem('cec-theme', 'light');
    }

    updateThemeButton();
})();

let uploadedProfileImage='';
function setPictureMode(){let file=document.querySelector('input[name="picMode"]:checked').value==='file';document.getElementById('profileFile').style.display=file?'block':'none';document.getElementById('profilePic').style.display=file?'none':'block';if(file&&uploadedProfileImage)document.getElementById('profilePic').value=uploadedProfileImage}
function loadProfileFile(input){let f=input.files[0];if(!f)return;if(f.size>250000){alert('Please upload an image smaller than 250 KB.');input.value='';return}let reader=new FileReader();reader.onload=()=>{uploadedProfileImage=reader.result;document.getElementById('profilePic').type='text';document.getElementById('profilePic').value=uploadedProfileImage};reader.readAsDataURL(f)}
async function shareCurrentPortfolio(){let id=currentPortfolio?.id;if(!id){alert('Save your portfolio first to create a public link.');return}let url=location.origin+'/p/'+encodeURIComponent(id);try{await navigator.clipboard.writeText(url);alert('Portfolio link copied: '+url)}catch(e){prompt('Copy your portfolio URL:',url)}}
document.getElementById('portfolioForm').addEventListener('submit',function(e){for(let id of ['fullName','jobTitle']){let el=document.getElementById(id);if(/[0-9]/.test(el.value)){e.preventDefault();alert(id==='fullName'?'Full name cannot contain numbers.':'Job title cannot contain numbers.');el.focus();return}}let ph=document.getElementById('phone');if(ph.value&&document.getElementById('countryCode').value==='+63'&&!/^0?9\d{9}$/.test(ph.value.replace(/\D/g,''))){e.preventDefault();alert('Enter a valid Philippine mobile number (09XXXXXXXXX).');ph.focus()}})
</script></body>
</html>
