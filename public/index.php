<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Desafios Fitness</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fonte Google (Poppins) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700" rel="stylesheet" />
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-thumb {
            background: #bbb;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-track {
            background: #f0f0f0;
        }

        /* Tabs */
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }

        /* Scroll smooth */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-green-100 to-green-200 text-gray-800 flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg flex flex-col p-6 space-y-8 fixed inset-y-0 left-0 z-20 overflow-y-auto animate__animated animate__fadeInLeft">
        <div class="flex items-center space-x-2">
            <span class="text-green-600 text-2xl font-extrabold">Desafios</span>
            <span class="text-2xl font-extrabold text-green-700">Fitness</span>
        </div>
        <nav class="flex flex-col space-y-4 mt-10">
            <a href="#dashboard" class="text-green-700 font-medium hover:text-green-900 transition-colors">📊 Dashboard</a>
            <a href="#usuarios" class="text-green-700 font-medium hover:text-green-900 transition-colors">👤 Usuários</a>
            <a href="#desafios" class="text-green-700 font-medium hover:text-green-900 transition-colors">🏆 Desafios</a>
            <a href="#progresso" class="text-green-700 font-medium hover:text-green-900 transition-colors">📈 Progresso</a>
        </nav>
        <footer class="mt-auto text-sm text-gray-500 text-center">
            © 2024 Desafios Fitness
        </footer>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-8 space-y-16 relative z-0 animate__animated animate__fadeIn">
        <!-- Dashboard Section -->
        <section id="dashboard" class="bg-white p-8 rounded-2xl shadow-2xl">
            <h2 class="text-3xl font-semibold mb-6 flex items-center gap-3 text-green-700 animate__animated animate__fadeInDown">Dashboard</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 animate__animated animate__fadeInUp">
                <!-- Total Usuários -->
                <div class="p-6 bg-green-500 text-white rounded-lg shadow-md transform hover:scale-105 transition-transform animate__animated animate__zoomIn">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-semibold">Total Usuários</h3>
                            <p id="totalUsuarios" class="text-4xl mt-2">0</p>
                        </div>
                        <span class="text-5xl">👥</span>
                    </div>
                </div>
                <!-- Total Desafios -->
                <div class="p-6 bg-blue-500 text-white rounded-lg shadow-md transform hover:scale-105 transition-transform animate__animated animate__zoomIn">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-semibold">Total Desafios</h3>
                            <p id="totalDesafios" class="text-4xl mt-2">0</p>
                        </div>
                        <span class="text-5xl">🏆</span>
                    </div>
                </div>
                <!-- Progresso Médio -->
                <div class="p-6 bg-yellow-500 text-white rounded-lg shadow-md transform hover:scale-105 transition-transform animate__animated animate__zoomIn">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-semibold">Progresso Médio</h3>
                            <p id="progressoMedio" class="text-4xl mt-2">0%</p>
                        </div>
                        <span class="text-5xl">📈</span>
                    </div>
                </div>
                <!-- Total Participações -->
                <div class="p-6 bg-purple-500 text-white rounded-lg shadow-md transform hover:scale-105 transition-transform animate__animated animate__zoomIn">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-semibold">Total Participações</h3>
                            <p id="totalParticipacoes" class="text-4xl mt-2">0</p>
                        </div>
                        <span class="text-5xl">🔄</span>
                    </div>
                </div>
            </div>
            <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Gráfico de Progresso dos Usuários -->
                <div class="bg-white p-6 rounded-lg shadow-md animate__animated animate__fadeInLeft">
                    <h3 class="text-2xl font-semibold mb-4 text-green-700">Top 5 Usuários por Progresso</h3>
                    <canvas id="topUsuariosChart"></canvas>
                </div>
                <!-- Distribuição de Progresso -->
                <div class="bg-white p-6 rounded-lg shadow-md animate__animated animate__fadeInRight">
                    <h3 class="text-2xl font-semibold mb-4 text-green-700">Distribuição de Progresso</h3>
                    <canvas id="distribuicaoProgressoChart"></canvas>
                </div>
            </div>
            <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Usuário com Mais Desafios -->
                <div class="p-6 bg-red-500 text-white rounded-lg shadow-md animate__animated animate__fadeInUp">
                    <h3 class="text-xl font-semibold">Usuário com Mais Desafios</h3>
                    <p id="usuarioMaisDesafios" class="text-3xl mt-2">N/A</p>
                </div>
                <!-- Desafio com Maior Participação -->
                <div class="p-6 bg-indigo-500 text-white rounded-lg shadow-md animate__animated animate__fadeInUp">
                    <h3 class="text-xl font-semibold">Desafio com Maior Participação</h3>
                    <p id="desafioMaiorParticipacao" class="text-3xl mt-2">N/A</p>
                </div>
            </div>
        </section>

        <!-- Seção Usuários -->
        <section id="usuarios" class="bg-white p-8 rounded-2xl shadow-2xl">
            <h2 class="text-3xl font-semibold mb-6 flex items-center gap-3 text-green-700 animate__animated animate__fadeInDown">Usuários</h2>

            <!-- Tabs Nav -->
            <div class="flex space-x-4 border-b pb-2 mb-4">
                <button class="tab-button font-medium text-green-800 hover:text-green-900 transition-colors" data-tab="tab-listar-usuarios">Listagem</button>
                <button class="tab-button font-medium text-green-800 hover:text-green-900 transition-colors" data-tab="tab-criar-usuarios">Criar</button>
                <button class="tab-button font-medium text-green-800 hover:text-green-900 transition-colors" data-tab="tab-login-usuarios">Login</button>
            </div>

            <!-- Tabs Content -->
            <div class="tab-content active" id="tab-listar-usuarios">
                <!-- Grid de Usuários em Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 animate__animated animate__fadeIn">
                    <div id="cardsUsuarios" class="grid grid-cols-1 gap-6"></div>
                </div>
            </div>

            <div class="tab-content" id="tab-criar-usuarios">
                <form id="formCriarUsuario" class="grid gap-6 md:grid-cols-2 animate__animated animate__fadeInUp">
                    <div class="flex flex-col">
                        <label class="font-medium">Nome:</label>
                        <input type="text" name="nome" required class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-medium">Email:</label>
                        <input type="email" name="email" required class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                    </div>
                    <div class="flex flex-col md:col-span-2">
                        <label class="font-medium">Senha:</label>
                        <input type="password" name="senha" required class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full px-6 py-3 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-transform transform hover:scale-105 shadow-lg">
                            Criar
                        </button>
                    </div>
                </form>
                <pre id="resCriarUsuario" class="mt-4 bg-gray-100 p-4 rounded-lg text-sm overflow-auto max-h-60 border border-green-100"></pre>
            </div>

            <div class="tab-content" id="tab-login-usuarios">
                <form id="formLoginUsuario" class="grid gap-6 md:grid-cols-2 animate__animated animate__fadeInUp">
                    <div class="flex flex-col">
                        <label class="font-medium">Email:</label>
                        <input type="email" name="email" required class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-medium">Senha:</label>
                        <input type="password" name="senha" required class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                    </div>
                    <div class="flex items-end md:col-span-2">
                        <button type="submit" class="w-full px-6 py-3 bg-yellow-500 text-white rounded-full hover:bg-yellow-600 transition-transform transform hover:scale-105 shadow-lg">
                            Login
                        </button>
                    </div>
                </form>
                <pre id="resLoginUsuario" class="mt-4 bg-gray-100 p-4 rounded-lg text-sm overflow-auto max-h-60 border border-green-100"></pre>
            </div>
        </section>

        <!-- Seção Desafios -->
        <section id="desafios" class="bg-white p-8 rounded-2xl shadow-2xl">
            <h2 class="text-3xl font-semibold mb-6 flex items-center gap-3 text-green-700 animate__animated animate__fadeInDown">Desafios</h2>

            <!-- Tabs Nav -->
            <div class="flex space-x-4 border-b pb-2 mb-4">
                <button class="tab-button font-medium text-green-800 hover:text-green-900 transition-colors" data-tab="tab-listar-desafios">Listagem</button>
                <button class="tab-button font-medium text-green-800 hover:text-green-900 transition-colors" data-tab="tab-criar-desafio">Criar</button>
                <button class="tab-button font-medium text-green-800 hover:text-green-900 transition-colors" data-tab="tab-participar-desafio">Participar</button>
                <button class="tab-button font-medium text-green-800 hover:text-green-900 transition-colors" data-tab="tab-progresso-desafio">Registrar Progresso</button>
            </div>

            <!-- Tabs Content -->
            <div class="tab-content active" id="tab-listar-desafios">
                <!-- Grid de Desafios em Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 animate__animated animate__fadeIn">
                    <div id="cardsDesafios" class="grid grid-cols-1 gap-6"></div>
                </div>
            </div>

            <div class="tab-content" id="tab-criar-desafio">
                <form id="formCriarDesafio" class="grid gap-6 md:grid-cols-2 animate__animated animate__fadeInUp">
                    <div class="flex flex-col">
                        <label class="font-medium">Título:</label>
                        <input type="text" name="titulo" required class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-medium">Data Início:</label>
                        <input type="date" name="data_inicio" required class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-medium">Data Fim:</label>
                        <input type="date" name="data_fim" required class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                    </div>
                    <div class="flex flex-col md:col-span-2">
                        <label class="font-medium">Descrição:</label>
                        <textarea name="descricao" class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"></textarea>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-medium">Criado por (Usuário):</label>
                        <select name="criado_por" id="selectCriadoPorDesafio" required class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"></select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full px-6 py-3 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-transform transform hover:scale-105 shadow-lg">
                            Criar Desafio
                        </button>
                    </div>
                </form>
                <pre id="resCriarDesafio" class="mt-4 bg-gray-100 p-4 rounded-lg text-sm overflow-auto max-h-60 border border-green-100"></pre>
            </div>

            <div class="tab-content" id="tab-participar-desafio">
                <form id="formParticiparDesafio" class="grid gap-6 md:grid-cols-2 animate__animated animate__fadeInUp">
                    <div class="flex flex-col">
                        <label class="font-medium">Usuário:</label>
                        <select name="usuario_id" id="selectUsuarioParticipar" required class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"></select>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-medium">Desafio:</label>
                        <select name="desafio_id" id="selectDesafioParticipar" required class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"></select>
                    </div>
                    <div class="flex items-end md:col-span-2">
                        <button type="submit" class="w-full px-6 py-3 bg-green-500 text-white rounded-full hover:bg-green-600 transition-transform transform hover:scale-105 shadow-lg">
                            Participar
                        </button>
                    </div>
                </form>
                <pre id="resParticiparDesafio" class="mt-4 bg-gray-100 p-4 rounded-lg text-sm overflow-auto max-h-60 border border-green-100"></pre>
            </div>

            <div class="tab-content" id="tab-progresso-desafio">
                <form id="formRegistrarProgressoDesafio" class="grid gap-6 md:grid-cols-2 animate__animated animate__fadeInUp">
                    <div class="flex flex-col">
                        <label class="font-medium">Usuário:</label>
                        <select name="usuario_id" id="selectUsuarioProgressoDesafio" required class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"></select>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-medium">Desafio:</label>
                        <select name="desafio_id" id="selectDesafioProgressoDesafio" required class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"></select>
                    </div>
                    <div class="flex flex-col md:col-span-2">
                        <label class="font-medium">Progresso (0-100):</label>
                        <input type="number" name="progresso" required min="0" max="100" class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                    </div>
                    <div class="flex items-end md:col-span-2">
                        <button type="submit" class="w-full px-6 py-3 bg-green-500 text-white rounded-full hover:bg-green-600 transition-transform transform hover:scale-105 shadow-lg">
                            Registrar Progresso
                        </button>
                    </div>
                </form>
                <pre id="resRegistrarProgressoDesafio" class="mt-4 bg-gray-100 p-4 rounded-lg text-sm overflow-auto max-h-60 border border-green-100"></pre>
            </div>
        </section>

        <!-- Seção Progresso -->
        <section id="progresso" class="bg-white p-8 rounded-2xl shadow-2xl">
            <h2 class="text-3xl font-semibold mb-6 flex items-center gap-3 text-green-700 animate__animated animate__fadeInDown">Progresso</h2>

            <!-- Tabs Nav -->
            <div class="flex space-x-4 border-b pb-2 mb-4">
                <button class="tab-button font-medium text-green-800 hover:text-green-900 transition-colors" data-tab="tab-listar-progresso">Listagem</button>
                <button class="tab-button font-medium text-green-800 hover:text-green-900 transition-colors" data-tab="tab-registrar-progresso">Registrar</button>
            </div>

            <!-- Tabs Content -->
            <div class="tab-content active" id="tab-listar-progresso">
                <!-- Tabela de Progresso -->
                <div class="overflow-auto max-h-96 border border-green-100 rounded-lg animate__animated animate__fadeIn">
                    <table class="min-w-full text-left border-collapse">
                        <thead class="border-b bg-green-50">
                            <tr>
                                <th class="py-2 px-3 text-green-800 font-medium">ID</th>
                                <th class="py-2 px-3 text-green-800 font-medium">Usuário</th>
                                <th class="py-2 px-3 text-green-800 font-medium">Desafio</th>
                                <th class="py-2 px-3 text-green-800 font-medium">Progresso</th>
                                <th class="py-2 px-3 text-green-800 font-medium">Data Registro</th>
                            </tr>
                        </thead>
                        <tbody id="tableBodyProgresso"></tbody>
                    </table>
                </div>
            </div>

            <div class="tab-content" id="tab-registrar-progresso">
                <form id="formRegistrarProgresso" class="grid gap-6 md:grid-cols-2 animate__animated animate__fadeInUp">
                    <div class="flex flex-col">
                        <label class="font-medium">Usuário:</label>
                        <select name="usuario_id" id="selectUsuarioProgressoGeral" required class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"></select>
                    </div>
                    <div class="flex flex-col">
                        <label class="font-medium">Desafio:</label>
                        <select name="desafio_id" id="selectDesafioProgressoGeral" required class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"></select>
                    </div>
                    <div class="flex flex-col md:col-span-2">
                        <label class="font-medium">Progresso (0-100):</label>
                        <input type="number" name="progresso" required min="0" max="100" class="border rounded p-3 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                    </div>
                    <div class="flex items-end md:col-span-2">
                        <button type="submit" class="w-full px-6 py-3 bg-green-500 text-white rounded-full hover:bg-green-600 transition-transform transform hover:scale-105 shadow-lg">
                            Registrar Progresso
                        </button>
                    </div>
                </form>
                <pre id="resRegistrarProgresso" class="mt-4 bg-gray-100 p-4 rounded-lg text-sm overflow-auto max-h-60 border border-green-100"></pre>
            </div>
        </section>
    </main>

    <script>
        const BASE_URL = '/mvc20242';

        // Variáveis para armazenar dados de usuários e desafios
        let usuariosData = [];
        let desafiosData = [];
        let progressoData = [];

        // Fetch functions
        async function doGet(url) {
            const res = await fetch(url);
            if (!res.ok) {
                console.error(`Erro ao buscar ${url}:`, res.statusText);
                return [];
            }
            return await res.json();
        }

        function setOutput(outputElementId, data) {
            document.getElementById(outputElementId).textContent = JSON.stringify(data, null, 2);
        }

        async function doPost(url, form, outputElementId) {
            const formData = new FormData(form);
            const jsonData = {};
            for (let [key, value] of formData) {
                jsonData[key] = value;
            }
            try {
                const res = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(jsonData)
                });
                if (!res.ok) {
                    throw new Error(`Erro na requisição: ${res.statusText}`);
                }
                const data = await res.json();
                setOutput(outputElementId, data);
                // Refresh data after successful POST
                await carregarListas();
                await carregarDashboard();
                await carregarSelects();
                await renderCardsUsuarios();
                await renderCardsDesafios();
            } catch (error) {
                console.error(error);
                setOutput(outputElementId, { error: error.message });
            }
        }

        // Render functions
        function renderUsuarios(usuarios) {
            usuariosData = usuarios;
            document.getElementById('totalUsuarios').textContent = usuarios.length;
        }

        function renderDesafios(desafios) {
            desafiosData = desafios;
            document.getElementById('totalDesafios').textContent = desafios.length;
        }

        function renderProgresso(progresso) {
            progressoData = progresso;
            const tbody = document.getElementById('tableBodyProgresso');
            tbody.innerHTML = '';
            progresso.forEach(p => {
                const usuario = usuariosData.find(u => u.id === p.usuario_id);
                const desafio = desafiosData.find(d => d.id === p.desafio_id);
                const usuarioNome = usuario ? usuario.nome : 'Desconhecido';
                const desafioTitulo = desafio ? desafio.titulo : 'Desconhecido';

                const tr = document.createElement('tr');
                tr.classList.add('border-b', 'hover:bg-green-50');
                tr.innerHTML = `
                    <td class="py-2 px-3">${p.id}</td>
                    <td class="py-2 px-3">${usuarioNome} (#${p.usuario_id})</td>
                    <td class="py-2 px-3">${desafioTitulo} (#${p.desafio_id})</td>
                    <td class="py-2 px-3">${p.progresso}%</td>
                    <td class="py-2 px-3">${p.data_registro || ''}</td>
                `;
                tbody.appendChild(tr);
            });
            document.getElementById('totalParticipacoes').textContent = progresso.length;
        }

        function renderTopUsuariosChart(usuarios) {
            const ctx = document.getElementById('topUsuariosChart').getContext('2d');
            // Filtrar usuários com progresso definido
            const top5 = usuarios
                .filter(u => u.progresso !== undefined && u.progresso !== null)
                .sort((a, b) => b.progresso - a.progresso)
                .slice(0, 5);
            const labels = top5.map(u => u.nome);
            const data = top5.map(u => u.progresso);
            if (topUsuariosChart) {
                topUsuariosChart.destroy();
            }
            topUsuariosChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Progresso (%)',
                        data: data,
                        backgroundColor: 'rgba(34, 197, 94, 0.6)',
                        borderColor: 'rgba(34, 197, 94, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true, max: 100 }
                    }
                }
            });
        }

        function renderDistribuicaoProgressoChart(progresso) {
            const ctx = document.getElementById('distribuicaoProgressoChart').getContext('2d');
            const ranges = {
                '0-20': 0,
                '21-40': 0,
                '41-60': 0,
                '61-80': 0,
                '81-100': 0
            };
            progresso.forEach(p => {
                if (p.progresso <= 20) ranges['0-20']++;
                else if (p.progresso <= 40) ranges['21-40']++;
                else if (p.progresso <= 60) ranges['41-60']++;
                else if (p.progresso <= 80) ranges['61-80']++;
                else ranges['81-100']++;
            });
            const labels = Object.keys(ranges);
            const data = Object.values(ranges);
            if (distribuicaoProgressoChart) {
                distribuicaoProgressoChart.destroy();
            }
            distribuicaoProgressoChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Distribuição de Progresso',
                        data: data,
                        backgroundColor: [
                            '#f87171',
                            '#fb923c',
                            '#fbbf24',
                            '#84cc16',
                            '#22c55e'
                        ],
                        borderColor: '#ffffff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true
                }
            });
        }

        async function carregarUsuariosEmSelect(selectId) {
            const usuarios = await doGet(`${BASE_URL}/usuarios/listar`);
            const select = document.getElementById(selectId);
            select.innerHTML = '<option value="">Selecione</option>';
            usuarios.forEach(u => {
                const opt = document.createElement('option');
                opt.value = u.id;
                opt.textContent = `${u.nome} (#${u.id})`;
                select.appendChild(opt);
            });
            usuariosData = usuarios;
        }

        async function carregarDesafiosEmSelect(selectId) {
            const desafios = await doGet(`${BASE_URL}/desafios/listar`);
            const select = document.getElementById(selectId);
            select.innerHTML = '<option value="">Selecione</option>';
            desafios.forEach(d => {
                const opt = document.createElement('option');
                opt.value = d.id;
                opt.textContent = `${d.titulo} (#${d.id})`;
                select.appendChild(opt);
            });
            desafiosData = desafios;
        }

        async function carregarProgressoEmListar() {
            const progresso = await doGet(`${BASE_URL}/progresso/listar`);
            renderProgresso(progresso);
        }

        // Carregar dados de listagem e dashboard
        async function carregarListas() {
            // Carrega usuários
            const usuarios = await doGet(`${BASE_URL}/usuarios/listar`);
            renderUsuarios(usuarios);

            // Carrega desafios
            const desafios = await doGet(`${BASE_URL}/desafios/listar`);
            renderDesafios(desafios);

            // Carrega progresso
            const progresso = await doGet(`${BASE_URL}/progresso/listar`);
            renderProgresso(progresso);
        }

        async function carregarDashboard() {
            const usuarios = await doGet(`${BASE_URL}/usuarios/listar`);
            const desafios = await doGet(`${BASE_URL}/desafios/listar`);
            const progresso = await doGet(`${BASE_URL}/progresso/listar`);

            // Calcular progresso médio
            const totalProgresso = progresso.reduce((acc, p) => acc + p.progresso, 0);
            const progressoMedio = progresso.length ? (totalProgresso / progresso.length).toFixed(2) : 0;
            document.getElementById('progressoMedio').textContent = `${progressoMedio}%`;

            // Calcular progresso médio por usuário
            const progressoPorUsuario = usuarios.map(u => {
                const userProgresso = progresso.filter(p => p.usuario_id === u.id);
                const total = userProgresso.reduce((acc, p) => acc + p.progresso, 0);
                const media = userProgresso.length ? (total / userProgresso.length).toFixed(2) : 0;
                return { ...u, progresso: parseFloat(media) };
            });

            renderTopUsuariosChart(progressoPorUsuario);
            renderDistribuicaoProgressoChart(progresso);

            // Indicadores Adicionais
            // Usuário com Mais Desafios
            const desafiosPorUsuario = {};
            progresso.forEach(p => {
                if (desafiosPorUsuario[p.usuario_id]) {
                    desafiosPorUsuario[p.usuario_id]++;
                } else {
                    desafiosPorUsuario[p.usuario_id] = 1;
                }
            });
            let maxDesafios = 0;
            let usuarioMaxDesafios = 'N/A';
            for (const [usuario_id, count] of Object.entries(desafiosPorUsuario)) {
                if (count > maxDesafios) {
                    maxDesafios = count;
                    const user = usuarios.find(u => u.id === parseInt(usuario_id));
                    usuarioMaxDesafios = user ? `${user.nome} (#${user.id})` : 'Desconhecido';
                }
            }
            document.getElementById('usuarioMaisDesafios').textContent = `${usuarioMaxDesafios} (${maxDesafios} desafios)`;

            // Desafio com Maior Participação
            const participacoesPorDesafio = {};
            progresso.forEach(p => {
                if (participacoesPorDesafio[p.desafio_id]) {
                    participacoesPorDesafio[p.desafio_id]++;
                } else {
                    participacoesPorDesafio[p.desafio_id] = 1;
                }
            });
            let maxParticipacoes = 0;
            let desafioMaxParticipacoes = 'N/A';
            for (const [desafio_id, count] of Object.entries(participacoesPorDesafio)) {
                if (count > maxParticipacoes) {
                    maxParticipacoes = count;
                    const desafio = desafios.find(d => d.id === parseInt(desafio_id));
                    desafioMaxParticipacoes = desafio ? `${desafio.titulo} (#${desafio.id})` : 'Desconhecido';
                }
            }
            document.getElementById('desafioMaiorParticipacao').textContent = `${desafioMaxParticipacoes} (${maxParticipacoes} participações)`;
        }

        async function carregarSelects() {
            await carregarUsuariosEmSelect('selectCriadoPorDesafio');
            await carregarUsuariosEmSelect('selectUsuarioParticipar');
            await carregarDesafiosEmSelect('selectDesafioParticipar');
            await carregarUsuariosEmSelect('selectUsuarioProgressoDesafio');
            await carregarDesafiosEmSelect('selectDesafioProgressoDesafio');
            await carregarUsuariosEmSelect('selectUsuarioProgressoGeral');
            await carregarDesafiosEmSelect('selectDesafioProgressoGeral');
        }

        // Função para renderizar cards de usuários
        async function renderCardsUsuarios() {
            const container = document.getElementById('cardsUsuarios');
            container.innerHTML = '';
            usuariosData.forEach(u => {
                const card = document.createElement('div');
                card.classList.add('p-6', 'bg-green-100', 'rounded-lg', 'shadow-md', 'flex', 'items-center', 'gap-4', 'animate__animated', 'animate__fadeInUp');
                card.innerHTML = `
                    <div class="text-4xl">${getEmojiForUser(u.id)}</div>
                    <div>
                        <h3 class="text-xl font-semibold">${u.nome}</h3>
                        <p class="text-gray-600">${u.email}</p>
                        <p class="text-gray-500">Desafios Participados: ${progressoData.filter(p => p.usuario_id === u.id).length}</p>
                    </div>
                `;
                container.appendChild(card);
            });
        }

        // Função para renderizar cards de desafios
        async function renderCardsDesafios() {
            const container = document.getElementById('cardsDesafios');
            container.innerHTML = '';
            desafiosData.forEach(d => {
                const participantes = progressoData.filter(p => p.desafio_id === d.id).length;
                const card = document.createElement('div');
                card.classList.add('p-6', 'bg-blue-100', 'rounded-lg', 'shadow-md', 'animate__animated', 'animate__fadeInUp');
                card.innerHTML = `
                    <h3 class="text-xl font-semibold">${d.titulo}</h3>
                    <p class="text-gray-600">${d.descricao}</p>
                    <p class="text-gray-500">Data: ${d.data_inicio} a ${d.data_fim}</p>
                    <p class="text-gray-500">Participações: ${participantes}</p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        ${getParticipantesDesafio(d.id)}
                    </div>
                `;
                container.appendChild(card);
            });
        }

        // Função para obter um emoji fictício para cada usuário
        function getEmojiForUser(userId) {
            const emojis = ['🐶', '🐱', '🦊', '🐰', '🦁', '🐼', '🐨', '🐸', '🐵', '🐯'];
            return emojis[userId % emojis.length];
        }

        // Função para obter participantes de um desafio
        function getParticipantesDesafio(desafioId) {
            const participantes = progressoData.filter(p => p.desafio_id === desafioId);
            if (participantes.length === 0) return '<span class="text-sm text-gray-500">Nenhum participante</span>';
            return participantes.map(p => {
                const user = usuariosData.find(u => u.id === p.usuario_id);
                return `<span class="text-2xl">${getEmojiForUser(p.usuario_id)} ${user ? user.nome : 'Desconhecido'}</span>`;
            }).join('');
        }

        // Chart instances
        let topUsuariosChart;
        let distribuicaoProgressoChart;

        window.addEventListener('DOMContentLoaded', async () => {
            await carregarSelects();
            await carregarListas();
            await carregarDashboard();
            await renderCardsUsuarios();
            await renderCardsDesafios();

            // Tab switching
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const tabId = btn.getAttribute('data-tab');
                    tabContents.forEach(tc => {
                        tc.classList.remove('active');
                        if (tc.id === tabId) tc.classList.add('active');
                    });
                });
            });

            // Ativar primeiro tab de cada seção por padrão
            document.querySelectorAll('section').forEach(section => {
                const firstTabBtn = section.querySelector('.tab-button');
                const firstTabId = firstTabBtn ? firstTabBtn.getAttribute('data-tab') : null;
                if (firstTabId) {
                    section.querySelectorAll('.tab-content').forEach(tc => {
                        tc.classList.remove('active');
                        if (tc.id === firstTabId) tc.classList.add('active');
                    });
                }
            });
        });

        // Usuários
        document.getElementById('formCriarUsuario').addEventListener('submit', (e) => {
            e.preventDefault();
            doPost(`${BASE_URL}/usuarios/criar`, e.target, 'resCriarUsuario');
        });
        document.getElementById('formLoginUsuario').addEventListener('submit', (e) => {
            e.preventDefault();
            doPost(`${BASE_URL}/usuarios/login`, e.target, 'resLoginUsuario');
        });

        // Desafios
        document.getElementById('formCriarDesafio').addEventListener('submit', (e) => {
            e.preventDefault();
            doPost(`${BASE_URL}/desafios/criar`, e.target, 'resCriarDesafio');
        });
        document.getElementById('formParticiparDesafio').addEventListener('submit', (e) => {
            e.preventDefault();
            doPost(`${BASE_URL}/desafios/participar`, e.target, 'resParticiparDesafio');
        });
        document.getElementById('formRegistrarProgressoDesafio').addEventListener('submit', (e) => {
            e.preventDefault();
            doPost(`${BASE_URL}/desafios/progresso`, e.target, 'resRegistrarProgressoDesafio');
        });

        // Progresso
        document.getElementById('formRegistrarProgresso').addEventListener('submit', (e) => {
            e.preventDefault();
            doPost(`${BASE_URL}/progresso/registrar`, e.target, 'resRegistrarProgresso');
        });

        // Função para renderizar cards de usuários
        async function renderCardsUsuarios() {
            const container = document.getElementById('cardsUsuarios');
            container.innerHTML = '';
            usuariosData.forEach(u => {
                const card = document.createElement('div');
                card.classList.add('p-6', 'bg-green-100', 'rounded-lg', 'shadow-md', 'flex', 'items-center', 'gap-4', 'animate__animated', 'animate__fadeInUp');
                card.innerHTML = `
                    <div class="text-4xl">${getEmojiForUser(u.id)}</div>
                    <div>
                        <h3 class="text-xl font-semibold">${u.nome}</h3>
                        <p class="text-gray-600">${u.email}</p>
                        <p class="text-gray-500">Desafios Participados: ${progressoData.filter(p => p.usuario_id === u.id).length}</p>
                    </div>
                `;
                container.appendChild(card);
            });
        }

        // Função para renderizar cards de desafios
        async function renderCardsDesafios() {
            const container = document.getElementById('cardsDesafios');
            container.innerHTML = '';
            desafiosData.forEach(d => {
                const participantes = progressoData.filter(p => p.desafio_id === d.id).length;
                const card = document.createElement('div');
                card.classList.add('p-6', 'bg-blue-100', 'rounded-lg', 'shadow-md', 'animate__animated', 'animate__fadeInUp');
                card.innerHTML = `
                    <h3 class="text-xl font-semibold">${d.titulo}</h3>
                    <p class="text-gray-600">${d.descricao}</p>
                    <p class="text-gray-500">Data: ${d.data_inicio} a ${d.data_fim}</p>
                    <p class="text-gray-500">Participações: ${participantes}</p>
                    <div class="mt-4 flex flex-wrap gap-2">
                        ${getParticipantesDesafio(d.id)}
                    </div>
                `;
                container.appendChild(card);
            });
        }

        // Função para obter um emoji fictício para cada usuário
        function getEmojiForUser(userId) {
            const emojis = ['🐶', '🐱', '🦊', '🐰', '🦁', '🐼', '🐨', '🐸', '🐵', '🐯'];
            return emojis[userId % emojis.length];
        }

        // Função para obter participantes de um desafio
        function getParticipantesDesafio(desafioId) {
            const participantes = progressoData.filter(p => p.desafio_id === desafioId);
            if (participantes.length === 0) return '<span class="text-sm text-gray-500">Nenhum participante</span>';
            return participantes.map(p => {
                const user = usuariosData.find(u => u.id === p.usuario_id);
                return `<span class="text-2xl">${getEmojiForUser(p.usuario_id)} ${user ? user.nome : 'Desconhecido'}</span>`;
            }).join('');
        }
    </script>
</body>
</html>
