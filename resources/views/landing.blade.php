<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTRATTO | Gestão Inteligente de Contratos B2B</title>
    <meta name="description"
        content="Software de Gestão de Contratos (CLM) para empresas. Governança, automação e compliance. Agende uma demonstração.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 8px;
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

        .toggle-checkbox:checked {
            right: 0;
            border-color: #007bff;
        }

        .toggle-checkbox:checked+.toggle-label {
            background-color: #007bff;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#eef7ff',
                            100: '#d9edff',
                            500: '#007bff',
                            600: '#0062cc',
                            900: '#001f40',
                        }
                    },
                    letterSpacing: {
                        tightest: '-.04em',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-white text-slate-600 antialiased selection:bg-brand-100 selection:text-brand-900">

    <!-- Navbar -->
    <nav class="fixed w-full z-50 top-0 start-0 border-b border-slate-100 bg-white/80 backdrop-blur-md">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center rtl:space-x-reverse">
                <span class="self-center text-xl font-semibold tracking-tightest text-slate-900">CONTRATTO</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="/login">
                    <button type="button"
                        class="text-slate-600 hover:text-brand-500 font-medium rounded-full text-sm px-4 py-2 text-center md:mr-2 transition-colors">Login</button>
                </a>
                <button type="button"
                    class="text-white bg-brand-500 hover:bg-brand-600 focus:ring-4 focus:outline-none focus:ring-brand-100 font-medium rounded-full text-sm px-5 py-2.5 text-center transition-all shadow-lg shadow-brand-500/30">Agendar
                    Demo</button>
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-slate-500 rounded-lg md:hidden hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-slate-200"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <iconify-icon icon="solar:hamburger-menu-linear" width="24" height="24"></iconify-icon>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-slate-100 rounded-2xl bg-slate-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a href="#solucoes"
                            class="block py-2 px-3 text-slate-600 rounded hover:bg-slate-100 md:hover:bg-transparent md:hover:text-brand-500 md:p-0 transition-colors">Soluções</a>
                    </li>
                    <li>
                        <a href="#beneficios"
                            class="block py-2 px-3 text-slate-600 rounded hover:bg-slate-100 md:hover:bg-transparent md:hover:text-brand-500 md:p-0 transition-colors">Benefícios</a>
                    </li>
                    <li>
                        <a href="#faq"
                            class="block py-2 px-3 text-slate-600 rounded hover:bg-slate-100 md:hover:bg-transparent md:hover:text-brand-500 md:p-0 transition-colors">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="relative pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full z-0 pointer-events-none">
            <div
                class="absolute top-20 left-1/4 w-96 h-96 bg-brand-100 rounded-full blur-3xl opacity-50 mix-blend-multiply filter">
            </div>
            <div
                class="absolute top-20 right-1/4 w-96 h-96 bg-indigo-50 rounded-full blur-3xl opacity-50 mix-blend-multiply filter">
            </div>
        </div>

        <div class="relative z-10 max-w-screen-xl mx-auto px-4 text-center">
            <div
                class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-50 border border-slate-200 text-xs font-medium text-slate-600 mb-8 animate-fade-in-up">
                <span class="relative flex h-2 w-2">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-500 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-500"></span>
                </span>
                Nova Integração via API disponível
            </div>

            <h1
                class="mb-6 text-4xl font-semibold tracking-tight text-slate-900 md:text-6xl lg:text-7xl max-w-4xl mx-auto leading-tight">
                Governança e Agilidade na <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-brand-500 to-indigo-600">Gestão de
                    Contratos</span>
            </h1>

            <p class="mb-10 text-lg font-normal text-slate-500 lg:text-xl sm:px-16 lg:px-48 max-w-3xl mx-auto">
                Elimine o caos das planilhas e assuma o controle total do ciclo de vida dos seus contratos com a
                CONTRATTO. Automação, segurança jurídica e compliance para empresas que não podem perder prazos.
            </p>

            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="#contact"
                    class="inline-flex justify-center items-center py-3 px-6 text-base font-medium text-white rounded-full bg-brand-500 hover:bg-brand-600 focus:ring-4 focus:ring-brand-100 transition-all shadow-lg shadow-brand-500/30">
                    Solicitar Demonstração
                    <iconify-icon icon="solar:arrow-right-linear" class="ml-2" width="20"></iconify-icon>
                </a>
                <a href="#features"
                    class="inline-flex justify-center items-center py-3 px-6 text-base font-medium text-slate-900 bg-white rounded-full border border-slate-200 hover:bg-slate-50 hover:border-slate-300 focus:ring-4 focus:ring-slate-100 transition-all">
                    Ver Funcionalidades
                </a>
            </div>

            <div
                class="mt-16 relative mx-auto max-w-5xl rounded-2xl bg-slate-900/5 p-2 ring-1 ring-inset ring-slate-900/10 lg:rounded-3xl lg:p-3">
                <div class="rounded-xl bg-white shadow-2xl ring-1 ring-slate-900/5 overflow-hidden">

                    <div class="flex items-center gap-2 border-b border-slate-100 bg-slate-50/50 px-4 py-3">
                        <div class="flex gap-1.5">
                            <div class="h-2.5 w-2.5 rounded-full bg-slate-200"></div>
                            <div class="h-2.5 w-2.5 rounded-full bg-slate-200"></div>
                            <div class="h-2.5 w-2.5 rounded-full bg-slate-200"></div>
                        </div>
                        <div class="mx-auto text-xs font-medium text-slate-400">CONTRATTO Dashboard</div>
                    </div>

                    <div class="flex flex-col md:flex-row h-64 md:h-96">

                        <div class="hidden md:flex w-56 flex-col border-r border-slate-100 bg-slate-50/30 p-4 gap-3">
                            <div class="h-2 w-20 rounded bg-slate-200 mb-4"></div>
                            <div
                                class="flex items-center gap-2 px-2 py-1.5 bg-white border border-slate-100 rounded-lg shadow-sm">
                                <iconify-icon icon="solar:folder-with-files-linear"
                                    class="text-brand-500"></iconify-icon>
                                <div class="h-2 w-16 rounded bg-brand-100"></div>
                            </div>
                            <div class="flex items-center gap-2 px-2 py-1.5">
                                <iconify-icon icon="solar:diagram-up-linear" class="text-slate-400"></iconify-icon>
                                <div class="h-2 w-12 rounded bg-slate-200"></div>
                            </div>
                            <div class="flex items-center gap-2 px-2 py-1.5">
                                <iconify-icon icon="solar:bell-linear" class="text-slate-400"></iconify-icon>
                                <div class="h-2 w-14 rounded bg-slate-200"></div>
                            </div>
                        </div>

                        <div class="flex-1 p-6 bg-white">
                            <div class="flex justify-between items-center mb-6">
                                <div>
                                    <div class="h-4 w-32 rounded bg-slate-800 mb-2"></div>
                                    <div class="h-2 w-48 rounded bg-slate-200"></div>
                                </div>
                                <div class="h-8 w-24 rounded-full bg-brand-500"></div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                <div class="p-4 rounded-xl border border-slate-100 bg-slate-50/50">
                                    <div class="flex justify-between mb-2">
                                        <div class="h-2 w-12 rounded bg-slate-300"></div>
                                        <iconify-icon icon="solar:graph-up-linear"
                                            class="text-emerald-500"></iconify-icon>
                                    </div>
                                    <div class="h-6 w-16 rounded bg-slate-800 mb-1"></div>
                                    <div class="h-2 w-24 rounded bg-slate-200"></div>
                                </div>

                                <div class="p-4 rounded-xl border border-slate-100 bg-slate-50/50">
                                    <div class="flex justify-between mb-2">
                                        <div class="h-2 w-12 rounded bg-slate-300"></div>
                                        <iconify-icon icon="solar:clock-circle-linear"
                                            class="text-orange-500"></iconify-icon>
                                    </div>
                                    <div class="h-6 w-10 rounded bg-slate-800 mb-1"></div>
                                    <div class="h-2 w-20 rounded bg-slate-200"></div>
                                </div>

                                <div class="p-4 rounded-xl border border-slate-100 bg-slate-50/50">
                                    <div class="flex justify-between mb-2">
                                        <div class="h-2 w-12 rounded bg-slate-300"></div>
                                        <iconify-icon icon="solar:shield-check-linear"
                                            class="text-brand-500"></iconify-icon>
                                    </div>
                                    <div class="h-6 w-12 rounded bg-slate-800 mb-1"></div>
                                    <div class="h-2 w-24 rounded bg-slate-200"></div>
                                </div>
                            </div>

                            <div class="mt-6 space-y-3">
                                <div
                                    class="h-10 w-full rounded-lg border border-slate-100 bg-slate-50 flex items-center px-4 justify-between">
                                    <div class="flex gap-4 items-center">
                                        <div class="h-3 w-3 rounded border border-slate-300"></div>
                                        <div class="h-2 w-24 rounded bg-slate-300"></div>
                                    </div>
                                    <div class="h-4 w-16 rounded-full bg-emerald-100"></div>
                                </div>
                                <div
                                    class="h-10 w-full rounded-lg border border-slate-100 bg-white flex items-center px-4 justify-between opacity-60">
                                    <div class="flex gap-4 items-center">
                                        <div class="h-3 w-3 rounded border border-slate-300"></div>
                                        <div class="h-2 w-32 rounded bg-slate-200"></div>
                                    </div>
                                    <div class="h-4 w-16 rounded-full bg-orange-100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-16 pt-8 border-t border-slate-100">
                <p class="text-sm font-medium text-slate-400 mb-6">Empresas líderes que confiam na CONTRATTO</p>
                <div
                    class="flex flex-wrap justify-center gap-8 md:gap-16 opacity-50 grayscale hover:grayscale-0 transition-all duration-500">

                    <span class="text-xl font-bold tracking-tight text-slate-800 flex items-center gap-1"><iconify-icon
                            icon="solar:box-minimalistic-linear"></iconify-icon> ACME Corp</span>
                    <span class="text-xl font-bold tracking-tight text-slate-800 flex items-center gap-1"><iconify-icon
                            icon="solar:atom-linear"></iconify-icon> Nexus</span>
                    <span class="text-xl font-bold tracking-tight text-slate-800 flex items-center gap-1"><iconify-icon
                            icon="solar:planet-linear"></iconify-icon> GlobalTech</span>
                    <span class="text-xl font-bold tracking-tight text-slate-800 flex items-center gap-1"><iconify-icon
                            icon="solar:layers-minimalistic-linear"></iconify-icon> Structura</span>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-50">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-semibold tracking-tight text-slate-900 mb-4">Sua gestão atual
                    custa caro</h2>
                <p class="text-slate-500 text-lg">Processos manuais e descentralizados expõem sua empresa a riscos
                    desnecessários.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div
                    class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center mb-6 text-red-500">
                        <iconify-icon icon="solar:bill-list-linear" width="28"></iconify-icon>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3 tracking-tight">Multas e Perda de Prazos</h3>
                    <p class="text-slate-500 leading-relaxed">Renovações automáticas indesejadas e multas por
                        esquecimento. A falta de alertas custa dinheiro real ao caixa da empresa.</p>
                </div>


                <div
                    class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                    <div
                        class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center mb-6 text-orange-500">
                        <iconify-icon icon="solar:hourglass-line-linear" width="28"></iconify-icon>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3 tracking-tight">Lentidão na Aprovação</h3>
                    <p class="text-slate-500 leading-relaxed">Contratos presos em e-mails. O comercial perde vendas
                        porque o jurídico demora para validar uma cláusula simples.</p>
                </div>


                <div
                    class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                    <div
                        class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center mb-6 text-slate-600">
                        <iconify-icon icon="solar:lock-password-unlocked-linear" width="28"></iconify-icon>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3 tracking-tight">Riscos de Compliance</h3>
                    <p class="text-slate-500 leading-relaxed">Versões desatualizadas circulando, falta de trilha de
                        auditoria e documentos salvos em computadores pessoais.</p>
                </div>
            </div>
        </div>
    </section>


    <section id="features" class="py-24 bg-white">
        <div class="max-w-screen-xl mx-auto px-4">
            <div class="mb-16">
                <h2 class="text-3xl md:text-4xl font-semibold tracking-tight text-slate-900 mb-4 max-w-2xl">A
                    plataforma completa para o <br>ciclo de vida contratual</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div
                    class="group relative overflow-hidden rounded-3xl bg-slate-50 border border-slate-200 p-8 md:p-12 hover:border-brand-200 transition-colors">
                    <div class="relative z-10">
                        <div
                            class="w-10 h-10 bg-brand-500 rounded-lg flex items-center justify-center mb-6 text-white shadow-lg shadow-brand-500/20">
                            <iconify-icon icon="solar:database-linear" width="24"></iconify-icon>
                        </div>
                        <h3 class="text-2xl font-semibold text-slate-900 mb-3 tracking-tight">Repositório Central
                            Inteligente</h3>
                        <p class="text-slate-500 mb-6">Uma única fonte da verdade. Encontre qualquer cláusula ou
                            contrato em segundos com busca avançada (OCR) e organização automática por tags.</p>
                        <ul class="space-y-2 text-sm text-slate-600 font-medium">
                            <li class="flex items-center gap-2">
                                <iconify-icon icon="solar:check-circle-linear" class="text-brand-500"></iconify-icon>
                                Busca indexada por conteúdo
                            </li>
                            <li class="flex items-center gap-2">
                                <iconify-icon icon="solar:check-circle-linear" class="text-brand-500"></iconify-icon>
                                Versionamento automático
                            </li>
                        </ul>
                    </div>
                </div>


                <div
                    class="group relative overflow-hidden rounded-3xl bg-slate-50 border border-slate-200 p-8 md:p-12 hover:border-brand-200 transition-colors">
                    <div class="relative z-10">
                        <div
                            class="w-10 h-10 bg-brand-500 rounded-lg flex items-center justify-center mb-6 text-white shadow-lg shadow-brand-500/20">
                            <iconify-icon icon="solar:diagram-up-linear" width="24"></iconify-icon>
                        </div>
                        <h3 class="text-2xl font-semibold text-slate-900 mb-3 tracking-tight">Workflow de Aprovação
                        </h3>
                        <p class="text-slate-500 mb-6">Desenhe fluxos de aprovação que funcionam. Envie automaticamente
                            para o Jurídico, Financeiro ou Diretoria baseado no valor ou tipo de contrato.</p>


                        <div class="flex items-center gap-2 mt-4 opacity-70">
                            <div class="px-3 py-1 rounded bg-white border border-slate-200 text-xs text-slate-500">
                                Solicitante</div>
                            <div class="h-px w-4 bg-slate-300"></div>
                            <div
                                class="px-3 py-1 rounded bg-white border border-brand-200 text-xs text-brand-600 font-semibold ring-1 ring-brand-100">
                                Jurídico</div>
                            <div class="h-px w-4 bg-slate-300"></div>
                            <div class="px-3 py-1 rounded bg-white border border-slate-200 text-xs text-slate-500">CFO
                            </div>
                        </div>
                    </div>
                </div>


                <div
                    class="group relative overflow-hidden rounded-3xl bg-slate-50 border border-slate-200 p-8 md:p-12 hover:border-brand-200 transition-colors">
                    <div class="relative z-10">
                        <div
                            class="w-10 h-10 bg-brand-500 rounded-lg flex items-center justify-center mb-6 text-white shadow-lg shadow-brand-500/20">
                            <iconify-icon icon="solar:alarm-linear" width="24"></iconify-icon>
                        </div>
                        <h3 class="text-2xl font-semibold text-slate-900 mb-3 tracking-tight">Alertas e Prazos</h3>
                        <p class="text-slate-500 mb-6">Configure notificações automáticas por e-mail para vencimentos,
                            reajustes (IGPM/IPCA) e renovações. Nunca mais perca uma data crítica.</p>
                        <div class="flex gap-2">
                            <span
                                class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Vence
                                em 30 dias</span>
                            <span
                                class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Renovação
                                Urgente</span>
                        </div>
                    </div>
                </div>


                <div class="group relative overflow-hidden rounded-3xl bg-slate-900 p-8 md:p-12">
                    <div class="relative z-10">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center mb-6 text-white backdrop-blur-sm border border-white/10">
                            <iconify-icon icon="solar:chart-square-linear" width="24"></iconify-icon>
                        </div>
                        <h3 class="text-2xl font-semibold text-white mb-3 tracking-tight">Dashboards de Gestão</h3>
                        <p class="text-slate-400 mb-6">Visibilidade total para o C-Level. Acompanhe KPIs contratuais,
                            volume financeiro comprometido e gargalos operacionais em tempo real.</p>
                        <div class="h-2 w-full bg-slate-800 rounded-full overflow-hidden">
                            <div class="h-full bg-brand-500 w-3/4"></div>
                        </div>
                        <div class="mt-2 flex justify-between text-xs text-slate-500">
                            <span>Eficiência Operacional</span>
                            <span class="text-brand-400">75%</span>
                        </div>
                    </div>

                    <div
                        class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 rounded-full bg-brand-500 opacity-20 blur-3xl">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-20 border-y border-slate-100 bg-slate-50">
        <div class="max-w-screen-xl mx-auto px-4 text-center">
            <div class="max-w-3xl mx-auto">
                <iconify-icon icon="solar:quote-up-linear" class="text-brand-500 mb-6" width="40"></iconify-icon>
                <blockquote class="text-2xl md:text-3xl font-medium text-slate-900 tracking-tight leading-snug mb-8">
                    "A CONTRATTO transformou a governança da nossa empresa. Reduzimos o tempo de assinatura em 60% e
                    eliminamos totalmente as multas por perda de prazo."
                </blockquote>
                <div class="flex items-center justify-center gap-4">
                    <div
                        class="w-12 h-12 bg-slate-200 rounded-full flex items-center justify-center text-slate-500 text-lg font-bold">
                        RF</div>
                    <div class="text-left">
                        <div class="text-slate-900 font-semibold">Roberto Faria</div>
                        <div class="text-slate-500 text-sm">Diretor Jurídico, Nexus Enterprise</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="faq" class="py-24 bg-white">
        <div class="max-w-3xl mx-auto px-4">
            <h2 class="text-3xl font-semibold tracking-tight text-slate-900 mb-12 text-center">Perguntas Frequentes
            </h2>

            <div class="space-y-4">

                <div class="group border border-slate-200 rounded-2xl p-6 hover:border-slate-300 transition-all">
                    <details class="group">
                        <summary
                            class="flex justify-between items-center font-medium cursor-pointer list-none text-slate-900 text-lg">
                            <span>A CONTRATTO possui integração via API?</span>
                            <span class="transition group-open:rotate-180">
                                <iconify-icon icon="solar:alt-arrow-down-linear" width="20"></iconify-icon>
                            </span>
                        </summary>
                        <div class="text-slate-500 mt-4 leading-relaxed text-sm">
                            Sim. Nossa API RESTful permite integração fácil com ERPs (SAP, Totvs, Oracle), CRMs
                            (Salesforce) e outras ferramentas corporativas, garantindo fluxo de dados contínuo.
                        </div>
                    </details>
                </div>

                <div class="group border border-slate-200 rounded-2xl p-6 hover:border-slate-300 transition-all">
                    <details class="group">
                        <summary
                            class="flex justify-between items-center font-medium cursor-pointer list-none text-slate-900 text-lg">
                            <span>Como funciona a segurança e LGPD?</span>
                            <span class="transition group-open:rotate-180">
                                <iconify-icon icon="solar:alt-arrow-down-linear" width="20"></iconify-icon>
                            </span>
                        </summary>
                        <div class="text-slate-500 mt-4 leading-relaxed text-sm">
                            Segurança é nossa prioridade. Utilizamos criptografia de ponta a ponta, servidores AWS com
                            certificação ISO 27001 e possuímos ferramentas nativas para gestão de consentimento e
                            anonimização de dados em conformidade com a LGPD.
                        </div>
                    </details>
                </div>


                <div class="group border border-slate-200 rounded-2xl p-6 hover:border-slate-300 transition-all">
                    <details class="group">
                        <summary
                            class="flex justify-between items-center font-medium cursor-pointer list-none text-slate-900 text-lg">
                            <span>Qual o tempo médio de implementação?</span>
                            <span class="transition group-open:rotate-180">
                                <iconify-icon icon="solar:alt-arrow-down-linear" width="20"></iconify-icon>
                            </span>
                        </summary>
                        <div class="text-slate-500 mt-4 leading-relaxed text-sm">
                            Depende da complexidade, mas nossa metodologia ágil permite o "Go Live" em média entre 4 a 8
                            semanas, incluindo migração de legado e treinamento da equipe.
                        </div>
                    </details>
                </div>


                <div class="group border border-slate-200 rounded-2xl p-6 hover:border-slate-300 transition-all">
                    <details class="group">
                        <summary
                            class="flex justify-between items-center font-medium cursor-pointer list-none text-slate-900 text-lg">
                            <span>É possível personalizar os fluxos de aprovação?</span>
                            <span class="transition group-open:rotate-180">
                                <iconify-icon icon="solar:alt-arrow-down-linear" width="20"></iconify-icon>
                            </span>
                        </summary>
                        <div class="text-slate-500 mt-4 leading-relaxed text-sm">
                            Totalmente. O editor de workflow é "no-code" (arrastar e soltar), permitindo que você crie
                            regras baseadas em valor, departamento, tipo de contrato e alçadas de competência sem
                            precisar de TI.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </section>


    <section id="contact" class="py-24 bg-slate-900 relative overflow-hidden">

        <div
            class="absolute top-0 right-0 w-96 h-96 bg-brand-500 rounded-full blur-[120px] opacity-20 pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 w-80 h-80 bg-indigo-600 rounded-full blur-[100px] opacity-20 pointer-events-none">
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-5xl font-semibold tracking-tight text-white mb-6">Pronto para assumir o
                controle dos seus contratos?</h2>
            <p class="text-slate-400 text-lg mb-10 max-w-2xl mx-auto">Agende uma demonstração personalizada com nossos
                especialistas e veja como a CONTRATTO pode gerar ROI para sua operação jurídica e de compras.</p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button
                    class="inline-flex justify-center items-center py-4 px-8 text-base font-medium text-white rounded-full bg-brand-500 hover:bg-brand-600 focus:ring-4 focus:ring-brand-900 transition-all shadow-xl shadow-brand-500/20">
                    <iconify-icon icon="solar:calendar-add-linear" class="mr-2" width="20"></iconify-icon>
                    Agendar Demonstração
                </button>
                <button
                    class="inline-flex justify-center items-center py-4 px-8 text-base font-medium text-white rounded-full border border-slate-700 hover:bg-slate-800 hover:border-slate-600 focus:ring-4 focus:ring-slate-800 transition-all">
                    Falar com Consultor
                </button>
            </div>
            <p class="mt-6 text-sm text-slate-500">
                <iconify-icon icon="solar:shield-check-linear" class="inline align-middle mr-1"></iconify-icon>
                Seus dados estão protegidos. Sem compromisso.
            </p>
        </div>
    </section>


    <footer class="bg-white border-t border-slate-200 py-12">
        <div class="max-w-screen-xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex flex-col items-center md:items-start">
                <span class="text-xl font-bold tracking-tightest text-slate-900 mb-2">CONTRATTO</span>
                <p class="text-sm text-slate-500">© 2024 Contratto CLM. Todos os direitos reservados.</p>
            </div>
            <div class="flex gap-6">
                <a href="#" class="text-slate-500 hover:text-brand-500 transition-colors">
                    <iconify-icon icon="solar:link-circle-linear" width="24"></iconify-icon>
                </a>
                <a href="#" class="text-slate-500 hover:text-brand-500 transition-colors">
                    <iconify-icon icon="solar:letter-linear" width="24"></iconify-icon>
                </a>
            </div>
        </div>
    </footer>

</body>

</html>
