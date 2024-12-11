<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Desafios Fitness</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonte Google (ex: Poppins) -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700" rel="stylesheet" />
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Barra de rolagem mais sutil */
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
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-green-100 to-green-200 text-gray-800">
    <header class="p-6 bg-white shadow-xl flex flex-col items-center gap-2 relative z-10">
        <h1 class="text-4xl font-extrabold text-green-700 tracking-tight flex items-center gap-2">
            Desafios Fitness <span class="animate-bounce">💪</span>
        </h1>
        <p class="text-gray-600 text-lg">Gerencie usuários, desafios e progresso</p>
    </header>

    <main class="p-6 max-w-7xl mx-auto mt-10 space-y-10 relative z-0">
        <!-- Card de Usuários -->
        <section class="bg-white p-8 rounded-2xl shadow-2xl">
            <h2 class="text-3xl font-semibold mb-6 flex items-center gap-3 text-green-700">
                <span class="material-icons-outlined text-2xl">person</span> Usuários
            </h2>
            <div class="space-y-8">
                <!-- Listar Usuários -->
                <div>
                    <h3 class="text-2xl font-semibold mb-2 text-green-800">Listar Usuários</h3>
                    <button id="btnListarUsuarios" class="px-4 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition-transform transform hover:scale-105">
                        Listar Usuários
                    </button>
                    <pre id="resListarUsuarios" class="mt-4 bg-gray-100 p-4 rounded-lg text-sm overflow-auto max-h-60 border border-green-100"></pre>
                </div>

                <!-- Criar Usuário -->
                <div>
                    <h3 class="text-2xl font-semibold mb-4 text-green-800">Criar Usuário</h3>
                    <form id="formCriarUsuario" class="grid gap-4 md:grid-cols-2">
                        <div class="flex flex-col">
                            <label class="font-medium">Nome:</label>
                            <input type="text" name="nome" required class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium">Email:</label>
                            <input type="email" name="email" required class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium">Senha:</label>
                            <input type="password" name="senha" required class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-transform transform hover:scale-105">
                                Criar
                            </button>
                        </div>
                    </form>
                    <pre id="resCriarUsuario" class="mt-4 bg-gray-100 p-4 rounded-lg text-sm overflow-auto max-h-60 border border-green-100"></pre>
                </div>

                <!-- Login -->
                <div>
                    <h3 class="text-2xl font-semibold mb-4 text-green-800">Login</h3>
                    <form id="formLoginUsuario" class="grid gap-4 md:grid-cols-2">
                        <div class="flex flex-col">
                            <label class="font-medium">Email:</label>
                            <input type="email" name="email" required class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium">Senha:</label>
                            <input type="password" name="senha" required class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-full hover:bg-yellow-600 transition-transform transform hover:scale-105">
                                Login
                            </button>
                        </div>
                    </form>
                    <pre id="resLoginUsuario" class="mt-4 bg-gray-100 p-4 rounded-lg text-sm overflow-auto max-h-60 border border-green-100"></pre>
                </div>
            </div>
        </section>

        <!-- Card de Desafios -->
        <section class="bg-white p-8 rounded-2xl shadow-2xl">
            <h2 class="text-3xl font-semibold mb-6 flex items-center gap-3 text-green-700">
                <span class="material-icons-outlined text-2xl">emoji_events</span> Desafios
            </h2>
            <div class="space-y-8">
                <!-- Listar Desafios -->
                <div>
                    <h3 class="text-2xl font-semibold mb-2 text-green-800">Listar Desafios</h3>
                    <button id="btnListarDesafios" class="px-4 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition-transform transform hover:scale-105">
                        Listar Desafios
                    </button>
                    <pre id="resListarDesafios" class="mt-4 bg-gray-100 p-4 rounded-lg text-sm overflow-auto max-h-60 border border-green-100"></pre>
                </div>

                <!-- Criar Desafio -->
                <div>
                    <h3 class="text-2xl font-semibold mb-4 text-green-800">Criar Desafio</h3>
                    <form id="formCriarDesafio" class="grid gap-4 md:grid-cols-2">
                        <div class="flex flex-col">
                            <label class="font-medium">Título:</label>
                            <input type="text" name="titulo" required class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                        </div>
                        <div class="flex flex-col md:col-span-2">
                            <label class="font-medium">Descrição:</label>
                            <textarea name="descricao" class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"></textarea>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium">Data Início:</label>
                            <input type="date" name="data_inicio" required class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium">Data Fim:</label>
                            <input type="date" name="data_fim" required class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium">Criado por (Usuário):</label>
                            <select name="criado_por" id="selectCriadoPor" required class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"></select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-transform transform hover:scale-105">
                                Criar Desafio
                            </button>
                        </div>
                    </form>
                    <pre id="resCriarDesafio" class="mt-4 bg-gray-100 p-4 rounded-lg text-sm overflow-auto max-h-60 border border-green-100"></pre>
                </div>

                <!-- Participar de Desafio -->
                <div>
                    <h3 class="text-2xl font-semibold mb-4 text-green-800">Participar de Desafio</h3>
                    <form id="formParticiparDesafio" class="grid gap-4 md:grid-cols-2">
                        <div class="flex flex-col">
                            <label class="font-medium">Usuário:</label>
                            <select name="usuario_id" id="selectUsuarioParticipar" required class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"></select>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium">Desafio:</label>
                            <select name="desafio_id" id="selectDesafioParticipar" required class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"></select>
                        </div>
                        <div class="flex items-end md:col-span-2">
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition-transform transform hover:scale-105">
                                Participar
                            </button>
                        </div>
                    </form>
                    <pre id="resParticiparDesafio" class="mt-4 bg-gray-100 p-4 rounded-lg text-sm overflow-auto max-h-60 border border-green-100"></pre>
                </div>

                <!-- Registrar Progresso em um Desafio -->
                <div>
                    <h3 class="text-2xl font-semibold mb-4 text-green-800">Registrar Progresso em um Desafio</h3>
                    <form id="formRegistrarProgressoDesafio" class="grid gap-4 md:grid-cols-2">
                        <div class="flex flex-col">
                            <label class="font-medium">Usuário:</label>
                            <select name="usuario_id" id="selectUsuarioProgressoDesafio" required class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"></select>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium">Desafio:</label>
                            <select name="desafio_id" id="selectDesafioProgressoDesafio" required class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"></select>
                        </div>
                        <div class="flex flex-col md:col-span-2">
                            <label class="font-medium">Progresso (0-100):</label>
                            <input type="number" name="progresso" required min="0" max="100" class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                        </div>
                        <div class="flex items-end md:col-span-2">
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition-transform transform hover:scale-105">
                                Registrar Progresso
                            </button>
                        </div>
                    </form>
                    <pre id="resRegistrarProgressoDesafio" class="mt-4 bg-gray-100 p-4 rounded-lg text-sm overflow-auto max-h-60 border border-green-100"></pre>
                </div>
            </div>
        </section>

        <!-- Card de Progresso -->
        <section class="bg-white p-8 rounded-2xl shadow-2xl">
            <h2 class="text-3xl font-semibold mb-6 flex items-center gap-3 text-green-700">
                <span class="material-icons-outlined text-2xl">show_chart</span> Progresso
            </h2>
            <div class="space-y-8">
                <!-- Listar Progresso -->
                <div>
                    <h3 class="text-2xl font-semibold mb-2 text-green-800">Listar Progresso</h3>
                    <button id="btnListarProgresso" class="px-4 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition-transform transform hover:scale-105">
                        Listar Progresso
                    </button>
                    <pre id="resListarProgresso" class="mt-4 bg-gray-100 p-4 rounded-lg text-sm overflow-auto max-h-60 border border-green-100"></pre>
                </div>

                <!-- Registrar Progresso (Geral) -->
                <div>
                    <h3 class="text-2xl font-semibold mb-4 text-green-800">Registrar Progresso (Geral)</h3>
                    <form id="formRegistrarProgresso" class="grid gap-4 md:grid-cols-2">
                        <div class="flex flex-col">
                            <label class="font-medium">Usuário:</label>
                            <select name="usuario_id" id="selectUsuarioProgressoGeral" required class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"></select>
                        </div>
                        <div class="flex flex-col">
                            <label class="font-medium">Desafio:</label>
                            <select name="desafio_id" id="selectDesafioProgressoGeral" required class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"></select>
                        </div>
                        <div class="flex flex-col md:col-span-2">
                            <label class="font-medium">Progresso (0-100):</label>
                            <input type="number" name="progresso" required min="0" max="100" class="border rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-300"/>
                        </div>
                        <div class="flex items-end md:col-span-2">
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition-transform transform hover:scale-105">
                                Registrar Progresso
                            </button>
                        </div>
                    </form>
                    <pre id="resRegistrarProgresso" class="mt-4 bg-gray-100 p-4 rounded-lg text-sm overflow-auto max-h-60 border border-green-100"></pre>
                </div>
            </div>
        </section>
    </main>

    <footer class="p-6 bg-white shadow-inner text-center text-sm text-gray-500 mt-10">
        © 2024 Desafios Fitness. Todos os direitos reservados.
    </footer>

    <script>
        const BASE_URL = '/mvc20242';

        async function doGet(url) {
            const res = await fetch(url);
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
            const res = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(jsonData)
            });
            const data = await res.json();
            setOutput(outputElementId, data);
        }

        async function carregarUsuariosEmSelect(selectId) {
            const usuarios = await doGet(`${BASE_URL}/usuarios/listar`);
            const select = document.getElementById(selectId);
            select.innerHTML = '';
            usuarios.forEach(u => {
                const opt = document.createElement('option');
                opt.value = u.id;
                opt.textContent = `${u.nome} (#${u.id})`;
                select.appendChild(opt);
            });
        }

        async function carregarDesafiosEmSelect(selectId) {
            const desafios = await doGet(`${BASE_URL}/desafios/listar`);
            const select = document.getElementById(selectId);
            select.innerHTML = '';
            desafios.forEach(d => {
                const opt = document.createElement('option');
                opt.value = d.id;
                opt.textContent = `${d.titulo} (#${d.id})`;
                select.appendChild(opt);
            });
        }

        window.addEventListener('DOMContentLoaded', async () => {
            await carregarUsuariosEmSelect('selectCriadoPor');
            await carregarUsuariosEmSelect('selectUsuarioParticipar');
            await carregarDesafiosEmSelect('selectDesafioParticipar');
            await carregarUsuariosEmSelect('selectUsuarioProgressoDesafio');
            await carregarDesafiosEmSelect('selectDesafioProgressoDesafio');
            await carregarUsuariosEmSelect('selectUsuarioProgressoGeral');
            await carregarDesafiosEmSelect('selectDesafioProgressoGeral');
        });

        // Usuários
        document.getElementById('btnListarUsuarios').addEventListener('click', async () => {
            const data = await doGet(`${BASE_URL}/usuarios/listar`);
            setOutput('resListarUsuarios', data);
        });
        document.getElementById('formCriarUsuario').addEventListener('submit', (e) => {
            e.preventDefault();
            doPost(`${BASE_URL}/usuarios/criar`, e.target, 'resCriarUsuario');
        });
        document.getElementById('formLoginUsuario').addEventListener('submit', (e) => {
            e.preventDefault();
            doPost(`${BASE_URL}/usuarios/login`, e.target, 'resLoginUsuario');
        });

        // Desafios
        document.getElementById('btnListarDesafios').addEventListener('click', async () => {
            const data = await doGet(`${BASE_URL}/desafios/listar`);
            setOutput('resListarDesafios', data);
        });
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
        document.getElementById('btnListarProgresso').addEventListener('click', async () => {
            const data = await doGet(`${BASE_URL}/progresso/listar`);
            setOutput('resListarProgresso', data);
        });
        document.getElementById('formRegistrarProgresso').addEventListener('submit', (e) => {
            e.preventDefault();
            doPost(`${BASE_URL}/progresso/registrar`, e.target, 'resRegistrarProgresso');
        });
    </script>
</body>
</html>
