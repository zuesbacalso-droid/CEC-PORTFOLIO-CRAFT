<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $data['fullName'] ?? 'Portfolio' }} — Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .portfolio-simple {
            background: #ffffff;
            color: #1e293b;
        }

        .portfolio-modern {
            background: #020617;
            color: #f1f5f9;
        }

        .portfolio-creative {
            background: linear-gradient(135deg, #312e81, #701a75, #9d174d);
            color: #ffffff;
        }

        .portfolio-creative .creative-card {
            background: #ffffff;
            color: #1e293b;
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .15);
        }

        @media print {
            body {
                background: white !important;
                padding: 0 !important;
            }

            .no-print {
                display: none !important;
            }

            .portfolio {
                box-shadow: none !important;
                margin: 0 !important;
                max-width: none !important;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-blue-50 p-4 md:p-8">

@php
    $template = in_array($data['template'] ?? 'simple', ['simple', 'modern', 'creative'])
        ? ($data['template'] ?? 'simple')
        : 'simple';

    $skills = $data['skills'] ?? [];
    $projects = $data['projects'] ?? [];
    $experience = $data['experience'] ?? [];
@endphp



<main class="portfolio portfolio-{{ $template }} max-w-5xl mx-auto rounded-3xl shadow-xl overflow-hidden">

    @if($template === 'simple')

        <div class="p-6 md:p-12">
            <header class="flex flex-col sm:flex-row items-start sm:items-center gap-6 border-b border-slate-200 pb-8">
                @if(!empty($data['profilePic']))
                    <img src="{{ $data['profilePic'] }}" alt="Profile photo"
                        class="w-28 h-28 rounded-full object-cover border-2 border-slate-200">
                @endif

                <div class="min-w-0">
                    <h1 class="text-4xl md:text-5xl font-bold text-slate-900">
                        {{ $data['fullName'] ?? '' }}
                    </h1>
                    <p class="text-xl font-semibold text-blue-700 mt-2">
                        {{ $data['jobTitle'] ?? '' }}
                    </p>
                    <div class="text-sm text-slate-500 mt-3 space-y-1">
                        @if(!empty($data['email']))<p><i class="fa-solid fa-envelope mr-2"></i>{{ $data['email'] }}</p>@endif
                        @if(!empty($data['phone']))<p><i class="fa-solid fa-phone mr-2"></i>{{ $data['phone'] }}</p>@endif
                        @if(!empty($data['address']))<p><i class="fa-solid fa-location-dot mr-2"></i>{{ $data['address'] }}</p>@endif
                    </div>
                </div>
            </header>

            <section class="py-7">
                <h2 class="text-sm uppercase tracking-widest font-bold text-blue-700 mb-3">About Me</h2>
                <p class="whitespace-pre-line leading-relaxed">{{ $data['aboutMe'] ?? '' }}</p>
            </section>

            <section class="py-7 border-t border-slate-200">
                <h2 class="text-sm uppercase tracking-widest font-bold text-blue-700 mb-4">Education</h2>
                <p class="font-bold">{{ $data['eduDegree'] ?? '' }}</p>
                <p class="text-slate-600">{{ $data['eduSchool'] ?? '' }} · {{ $data['eduYear'] ?? '' }}</p>
            </section>

            <section class="py-7 border-t border-slate-200">
                <h2 class="text-sm uppercase tracking-widest font-bold text-blue-700 mb-4">Skills</h2>
                <div class="flex flex-wrap gap-2">
                    @foreach($skills as $skill)
                        <span class="bg-blue-50 text-blue-700 px-3 py-2 rounded-lg text-sm">{{ $skill }}</span>
                    @endforeach
                </div>
            </section>

            <section class="py-7 border-t border-slate-200">
                <h2 class="text-sm uppercase tracking-widest font-bold text-blue-700 mb-4">Projects</h2>
                @forelse($projects as $project)
                    <article class="mb-5 rounded-xl border border-slate-200 bg-slate-50 p-5">
                        <h3 class="font-bold text-slate-900">{{ $project['title'] ?? '' }}</h3>
                        <p class="text-sm text-slate-600 mt-2 whitespace-pre-line">{{ $project['desc'] ?? '' }}</p>
                        @if(!empty($project['link']))
                            <a href="{{ $project['link'] }}" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 text-sm underline mt-2 inline-block">View Project</a>
                        @endif
                    </article>
                @empty
                    <p class="text-slate-500">No projects added.</p>
                @endforelse
            </section>

            <section class="py-7 border-t border-slate-200">
                <h2 class="text-sm uppercase tracking-widest font-bold text-blue-700 mb-4">Work Experience</h2>
                @forelse($experience as $job)
                    <article class="mb-5">
                        <h3 class="font-bold">{{ $job['role'] ?? '' }}</h3>
                        <p class="text-blue-700 text-sm">{{ $job['company'] ?? '' }}</p>
                        <p class="text-slate-500 text-sm">{{ $job['duration'] ?? '' }}</p>
                        <p class="mt-2 whitespace-pre-line">{{ $job['desc'] ?? '' }}</p>
                    </article>
                @empty
                    <p class="text-slate-500">No work experience added.</p>
                @endforelse
            </section>
        </div>

    @elseif($template === 'modern')

        <div class="p-6 md:p-10">
            <header class="bg-slate-900 rounded-3xl border border-slate-700 p-6 md:p-9 flex flex-col md:flex-row items-center gap-7">
                @if(!empty($data['profilePic']))
                    <img src="{{ $data['profilePic'] }}" alt="Profile photo"
                        class="w-32 h-32 rounded-2xl object-cover border-2 border-indigo-500">
                @endif

                <div class="flex-1 text-center md:text-left">
                    <span class="inline-block bg-indigo-500/20 text-indigo-300 px-3 py-1 rounded-full text-xs font-bold mb-3">
                        PROFESSIONAL PORTFOLIO
                    </span>
                    <h1 class="text-4xl font-extrabold text-white">{{ $data['fullName'] ?? '' }}</h1>
                    <p class="text-indigo-400 text-xl font-semibold mt-2">{{ $data['jobTitle'] ?? '' }}</p>
                    <p class="text-slate-300 mt-4 whitespace-pre-line">{{ $data['aboutMe'] ?? '' }}</p>
                    <div class="text-slate-400 text-sm mt-4 space-y-1">
                        @if(!empty($data['email']))<p>{{ $data['email'] }}</p>@endif
                        @if(!empty($data['phone']))<p>{{ $data['phone'] }}</p>@endif
                        @if(!empty($data['address']))<p>{{ $data['address'] }}</p>@endif
                    </div>
                </div>
            </header>

            <div class="grid md:grid-cols-3 gap-6 mt-7">
                <aside class="space-y-6">
                    <section class="bg-slate-900 border border-slate-700 rounded-2xl p-6">
                        <h2 class="text-indigo-400 font-bold mb-4"><i class="fa-solid fa-code mr-2"></i>Skills</h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($skills as $skill)
                                <span class="bg-slate-800 border border-slate-700 text-indigo-200 px-3 py-2 rounded-lg text-sm">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </section>

                    <section class="bg-slate-900 border border-slate-700 rounded-2xl p-6">
                        <h2 class="text-indigo-400 font-bold mb-4"><i class="fa-solid fa-graduation-cap mr-2"></i>Education</h2>
                        <p class="font-bold">{{ $data['eduDegree'] ?? '' }}</p>
                        <p class="text-slate-400 text-sm mt-2">{{ $data['eduSchool'] ?? '' }}</p>
                        <p class="text-indigo-300 text-sm">{{ $data['eduYear'] ?? '' }}</p>
                    </section>

                    <section class="bg-slate-900 border border-slate-700 rounded-2xl p-6">
                        <h2 class="text-indigo-400 font-bold mb-4"><i class="fa-solid fa-share-nodes mr-2"></i>Social Links</h2>
                        <div class="space-y-3 text-sm">
                            @if(!empty($data['socialGithub']))<a class="block text-slate-300 hover:text-indigo-300" href="{{ $data['socialGithub'] }}" target="_blank" rel="noopener noreferrer">GitHub</a>@endif
                            @if(!empty($data['socialLinkedin']))<a class="block text-slate-300 hover:text-indigo-300" href="{{ $data['socialLinkedin'] }}" target="_blank" rel="noopener noreferrer">LinkedIn</a>@endif
                            @if(!empty($data['socialWebsite']))<a class="block text-slate-300 hover:text-indigo-300" href="{{ $data['socialWebsite'] }}" target="_blank" rel="noopener noreferrer">Personal Website</a>@endif
                        </div>
                    </section>
                </aside>

                <div class="md:col-span-2 space-y-6">
                    <section class="bg-slate-900 border border-slate-700 rounded-2xl p-6">
                        <h2 class="text-indigo-400 font-bold mb-5"><i class="fa-solid fa-briefcase mr-2"></i>Work Experience</h2>
                        @forelse($experience as $job)
                            <article class="border-l-2 border-indigo-500 pl-4 mb-5">
                                <h3 class="font-bold text-white">{{ $job['role'] ?? '' }}</h3>
                                <p class="text-indigo-300 text-sm">{{ $job['company'] ?? '' }}</p>
                                <p class="text-slate-400 text-xs mt-1">{{ $job['duration'] ?? '' }}</p>
                                <p class="text-slate-300 text-sm mt-3 whitespace-pre-line">{{ $job['desc'] ?? '' }}</p>
                            </article>
                        @empty
                            <p class="text-slate-400">No work experience added.</p>
                        @endforelse
                    </section>

                    <section class="bg-slate-900 border border-slate-700 rounded-2xl p-6">
                        <h2 class="text-indigo-400 font-bold mb-5"><i class="fa-solid fa-rocket mr-2"></i>Projects</h2>
                        @forelse($projects as $project)
                            <article class="bg-slate-800 rounded-xl p-5 mb-4">
                                <h3 class="font-bold text-white">{{ $project['title'] ?? '' }}</h3>
                                <p class="text-slate-300 text-sm mt-2 whitespace-pre-line">{{ $project['desc'] ?? '' }}</p>
                                @if(!empty($project['link']))
                                    <a href="{{ $project['link'] }}" target="_blank" rel="noopener noreferrer" class="text-indigo-300 text-sm mt-3 inline-block">Open Project ↗</a>
                                @endif
                            </article>
                        @empty
                            <p class="text-slate-400">No projects added.</p>
                        @endforelse
                    </section>
                </div>
            </div>
        </div>

    @else

        <div class="p-6 md:p-10">
            <header class="creative-card mb-7">
                <div class="flex flex-col md:flex-row items-center gap-7">
                    @if(!empty($data['profilePic']))
                        <img src="{{ $data['profilePic'] }}" alt="Profile photo"
                            class="w-36 h-36 rounded-3xl object-cover border-4 border-white shadow-xl">
                    @endif
                    <div class="text-center md:text-left">
                        <span class="inline-block bg-pink-100 text-pink-700 px-3 py-1 rounded-full text-xs font-black">CREATIVE MIND</span>
                        <h1 class="text-4xl md:text-5xl font-black text-slate-900 mt-3">{{ $data['fullName'] ?? '' }}</h1>
                        <p class="text-xl font-bold text-purple-600 mt-2">{{ $data['jobTitle'] ?? '' }}</p>
                        <p class="text-slate-600 mt-4 whitespace-pre-line">{{ $data['aboutMe'] ?? '' }}</p>
                    </div>
                </div>
            </header>

            <div class="grid md:grid-cols-3 gap-6">
                <aside class="space-y-6">
                    <section class="creative-card">
                        <h2 class="font-black text-pink-600 mb-4"><i class="fa-solid fa-wand-magic-sparkles mr-2"></i>Superpowers</h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($skills as $skill)
                                <span class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-3 py-2 rounded-xl text-sm font-bold">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </section>

                    <section class="creative-card">
                        <h2 class="font-black text-indigo-600 mb-4"><i class="fa-solid fa-compass mr-2"></i>Info & Location</h2>
                        <p class="text-sm mb-2"><strong>Education:</strong> {{ $data['eduDegree'] ?? '' }}</p>
                        <p class="text-sm mb-2"><strong>School:</strong> {{ $data['eduSchool'] ?? '' }}</p>
                        <p class="text-sm mb-2"><strong>Year:</strong> {{ $data['eduYear'] ?? '' }}</p>
                        <p class="text-sm mb-2"><strong>Location:</strong> {{ $data['address'] ?? 'Global' }}</p>
                        <p class="text-sm break-words"><strong>Email:</strong> {{ $data['email'] ?? '' }}</p>
                        @if(!empty($data['phone']))<p class="text-sm mt-2"><strong>Phone:</strong> {{ $data['phone'] }}</p>@endif
                    </section>
                </aside>

                <div class="md:col-span-2 space-y-6">
                    <section class="creative-card">
                        <h2 class="text-xl font-black text-purple-700 mb-5"><i class="fa-solid fa-palette mr-2"></i>Featured Work</h2>
                        @forelse($projects as $project)
                            <article class="bg-slate-50 border border-slate-200 rounded-2xl p-5 mb-4">
                                <h3 class="font-black text-slate-900">{{ $project['title'] ?? '' }}</h3>
                                <p class="text-slate-600 text-sm mt-2 whitespace-pre-line">{{ $project['desc'] ?? '' }}</p>
                                @if(!empty($project['link']))
                                    <a href="{{ $project['link'] }}" target="_blank" rel="noopener noreferrer" class="text-pink-600 text-sm font-bold mt-3 inline-block">Explore Project ↗</a>
                                @endif
                            </article>
                        @empty
                            <p class="text-slate-500">No projects added.</p>
                        @endforelse
                    </section>

                    <section class="creative-card">
                        <h2 class="text-xl font-black text-purple-700 mb-5"><i class="fa-solid fa-fire mr-2"></i>Experience Journey</h2>
                        @forelse($experience as $job)
                            <article class="bg-slate-50 border border-slate-200 rounded-2xl p-5 mb-4">
                                <h3 class="font-bold text-slate-900">{{ $job['role'] ?? '' }}</h3>
                                <p class="text-pink-600 text-sm font-bold mt-1">{{ $job['company'] ?? '' }}</p>
                                <p class="text-purple-700 text-xs mt-1">{{ $job['duration'] ?? '' }}</p>
                                <p class="text-slate-600 text-sm mt-3 whitespace-pre-line">{{ $job['desc'] ?? '' }}</p>
                            </article>
                        @empty
                            <p class="text-slate-500">No work experience added.</p>
                        @endforelse
                    </section>
                </div>
            </div>
        </div>

    @endif

</main>
</body>
</html>