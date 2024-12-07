<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Desafios Fitness</title>
    <!-- Tailwind CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="p-6 bg-white shadow flex flex-col items-center">
        <h1 class="text-3xl font-bold mb-2">Desafios Fitness <span>💪</span></h1>
        <p class="text-gray-600">Gerencie usuários, desafios e progresso</p>
    </header>

    <main class="p-6 space-y-8 max-w-4xl mx-auto">
        
        <section class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">Usuários <span>👤</span></h2>
            <div class="border-b pb-4 mb-4">
                <h3 class="text-xl font-semibold mb-2">Listar Usuários</h3>
                <button id="btnListarUsuarios" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Listar Usuários</button>
                <pre id="resListarUsuarios" class="mt-2 bg-gray-50 p-2 rounded text-sm overflow-auto"></pre>
            </div>

            <div class="border-b pb-4 mb-4">
                <h3 class="text-xl font-semibold mb-2">Criar Usuário</h3>
                <form id="formCriarUsuario" class="space-y-2">
                    <div>
                        <label class="block">Nome:</label>
                        <input type="text" name="nome" required class="border rounded p-1 w-full"/>
                    </div>
                    <div>
                        <label class="block">Email:</label>
                        <input type="email" name="email" required class="border rounded p-1 w-full"/>
                    </div>
                    <div>
                        <label class="block">Senha:</label>
                        <input type="password" name="senha" required class="border rounded p-1 w-full"/>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Criar</button>
                </form>
                <pre id="resCriarUsuario" class="mt-2 bg-gray-50 p-2 rounded text-sm overflow-auto"></pre>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">Login</h3>
                <form id="formLoginUsuario" class="space-y-2">
                    <div>
                        <label class="block">Email:</label>
                        <input type="email" name="email" required class="border rounded p-1 w-full"/>
                    </div>
                    <div>
                        <label class="block">Senha:</label>
                        <input type="password" name="senha" required class="border rounded p-1 w-full"/>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Login</button>
                </form>
                <pre id="resLoginUsuario" class="mt-2 bg-gray-50 p-2 rounded text-sm overflow-auto"></pre>
            </div>
        </section>

        <section class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">Desafios <span>🏆</span></h2>
            <div class="border-b pb-4 mb-4">
                <h3 class="text-xl font-semibold mb-2">Listar Desafios</h3>
                <button id="btnListarDesafios" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Listar Desafios</button>
                <pre id="resListarDesafios" class="mt-2 bg-gray-50 p-2 rounded text-sm overflow-auto"></pre>
            </div>

            <div class="border-b pb-4 mb-4">
                <h3 class="text-xl font-semibold mb-2">Criar Desafio</h3>
                <form id="formCriarDesafio" class="space-y-2">
                    <div>
                        <label class="block">Título:</label>
                        <input type="text" name="titulo" required class="border rounded p-1 w-full"/>
                    </div>
                    <div>
                        <label class="block">Descrição:</label>
                        <textarea name="descricao" class="border rounded p-1 w-full"></textarea>
                    </div>
                    <div>
                        <label class="block">Data Início:</label>
                        <input type="date" name="data_inicio" required class="border rounded p-1 w-full"/>
                    </div>
                    <div>
                        <label class="block">Data Fim:</label>
                        <input type="date" name="data_fim" required class="border rounded p-1 w-full"/>
                    </div>
                    <div>
                        <label class="block">Criado por (Usuário):</label>
                        <select name="criado_por" id="selectCriadoPor" required class="border rounded p-1 w-full"></select>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Criar Desafio</button>
                </form>
                <pre id="resCriarDesafio" class="mt-2 bg-gray-50 p-2 rounded text-sm overflow-auto"></pre>
            </div>

            <div class="border-b pb-4 mb-4">
                <h3 class="text-xl font-semibold mb-2">Participar de Desafio</h3>
                <form id="formParticiparDesafio" class="space-y-2">
                    <div>
                        <label class="block">Usuário:</label>
                        <select name="usuario_id" id="selectUsuarioParticipar" required class="border rounded p-1 w-full"></select>
                    </div>
                    <div>
                        <label class="block">Desafio:</label>
                        <select name="desafio_id" id="selectDesafioParticipar" required class="border rounded p-1 w-full"></select>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Participar</button>
                </form>
                <pre id="resParticiparDesafio" class="mt-2 bg-gray-50 p-2 rounded text-sm overflow-auto"></pre>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">Registrar Progresso em um Desafio</h3>
                <form id="formRegistrarProgressoDesafio" class="space-y-2">
                    <div>
                        <label class="block">Usuário:</label>
                        <select name="usuario_id" id="selectUsuarioProgressoDesafio" required class="border rounded p-1 w-full"></select>
                    </div>
                    <div>
                        <label class="block">Desafio:</label>
                        <select name="desafio_id" id="selectDesafioProgressoDesafio" required class="border rounded p-1 w-full"></select>
                    </div>
                    <div>
                        <label class="block">Progresso (0-100):</label>
                        <input type="number" name="progresso" required min="0" max="100" class="border rounded p-1 w-full"/>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Registrar Progresso</button>
                </form>
                <pre id="resRegistrarProgressoDesafio" class="mt-2 bg-gray-50 p-2 rounded text-sm overflow-auto"></pre>
            </div>
        </section>

        <section class="bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">Progresso <span>📈</span></h2>
            <div class="border-b pb-4 mb-4">
                <h3 class="text-xl font-semibold mb-2">Listar Progresso</h3>
                <button id="btnListarProgresso" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Listar Progresso</button>
                <pre id="resListarProgresso" class="mt-2 bg-gray-50 p-2 rounded text-sm overflow-auto"></pre>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-2">Registrar Progresso (Geral)</h3>
                <form id="formRegistrarProgresso" class="space-y-2">
                    <div>
                        <label class="block">Usuário:</label>
                        <select name="usuario_id" id="selectUsuarioProgressoGeral" required class="border rounded p-1 w-full"></select>
                    </div>
                    <div>
                        <label class="block">Desafio:</label>
                        <select name="desafio_id" id="selectDesafioProgressoGeral" required class="border rounded p-1 w-full"></select>
                    </div>
                    <div>
                        <label class="block">Progresso (0-100):</label>
                        <input type="number" name="progresso" required min="0" max="100" class="border rounded p-1 w-full"/>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Registrar Progresso</button>
                </form>
                <pre id="resRegistrarProgresso" class="mt-2 bg-gray-50 p-2 rounded text-sm overflow-auto"></pre>
            </div>
        </section>

    </main>

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
            // Carrega as listas de usuários e desafios em todos os selects necessários
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
