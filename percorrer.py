import os
import fnmatch

# Nome do arquivo de saída
NOME_ARQUIVO_SAIDA = 'todos_os_arquivos.txt'

# Lista de padrões comuns a serem ignorados, semelhante a um .gitignore básico
PADROES_IGNORAR = [
    '.git',                # Diretório Git
    '__pycache__',         # Diretórios de cache do Python
    '*.pyc',               # Arquivos compilados do Python
    '*.pyo',
    '*.log',               # Arquivos de log
    '*.tmp',               # Arquivos temporários
    'node_modules',        # Diretórios de dependências do Node.js
    'venv',                # Diretórios de ambientes virtuais Python
    'env',                 # Outro nome comum para ambientes virtuais
    '*.DS_Store',          # Arquivos do macOS
    '*.exe',               # Arquivos executáveis
    '*.dll',
    '*.so',
    '*.dylib',
    '*.o',
    '*.obj',
    '*.class',
    '*.jar',
    '*.war',
    '*.ear',
    '*.iml',
    '*.sublime-workspace',
    '*.sublime-project',
    '.idea',               # Diretório de configurações do IDE IntelliJ
    '.vscode',             # Diretório de configurações do VS Code
    'dist',                # Diretórios de distribuição
    'build',               # Diretórios de build
    '*.bak',               # Arquivos de backup
    '*.backup',
    '*.swp',               # Arquivos temporários do Vim
    '*.swo',
    '*.cache',
    '*.pid',
    '*.seed',
    '*.pid.lock',
    '*.cover',
    '*.coverage',
    '*.egg-info',
    '*.eggs',
    NOME_ARQUIVO_SAIDA,    # Arquivo de saída gerado pelo script
    "percorrer.py",
    ".mypy_cache"
]

def carregar_gitignore(diretorio_inicial='.'):
    """
    Carrega os padrões do arquivo .gitignore, se existir, e os adiciona à lista de padrões a serem ignorados.
    """
    gitignore_path = os.path.join(diretorio_inicial, '.gitignore')
    if not os.path.isfile(gitignore_path):
        return

    with open(gitignore_path, 'r', encoding='utf-8') as f:
        linhas = f.readlines()

    for linha in linhas:
        linha = linha.strip()
        if linha == '' or linha.startswith('#'):
            continue  # Ignora linhas vazias e comentários
        PADROES_IGNORAR.append(linha)

def deve_ignorar(caminho_relativo):
    """
    Verifica se o caminho fornecido corresponde a algum dos padrões de ignoração.
    Suporta padrões simples com curingas (* e ?).
    """
    # Verifica se o caminho completo ou qualquer parte do caminho corresponde a um padrão
    partes = caminho_relativo.split(os.sep)
    for i in range(1, len(partes)+1):
        subcaminho = os.sep.join(partes[:i])
        for padrao in PADROES_IGNORAR:
            if fnmatch.fnmatch(subcaminho, padrao):
                return True
    return False

def coletar_conteudos(diretorio_inicial='.'):
    """
    Coleta o conteúdo de todos os arquivos não ignorados a partir do diretório inicial.
    """
    conteudo_total = ""
    for raiz, dirs, arquivos in os.walk(diretorio_inicial):
        # Calcula o caminho relativo a partir do diretório inicial
        caminho_raiz_relativo = os.path.relpath(raiz, diretorio_inicial)
        if caminho_raiz_relativo == '.':
            caminho_raiz_relativo = ''

        # Filtra diretórios que devem ser ignorados
        dirs[:] = [d for d in dirs if not deve_ignorar(os.path.join(caminho_raiz_relativo, d))]

        for arquivo in arquivos:
            caminho_completo = os.path.join(raiz, arquivo)
            caminho_relativo = os.path.relpath(caminho_completo, diretorio_inicial)

            # Verifica se o arquivo deve ser ignorado
            if deve_ignorar(caminho_relativo):
                continue

            try:
                with open(caminho_completo, 'r', encoding='utf-8') as f:
                    conteudo = f.read()
            except UnicodeDecodeError:
                # Tenta ler com encoding diferente ou pula o arquivo
                try:
                    with open(caminho_completo, 'r', encoding='latin-1') as f:
                        conteudo = f.read()
                except Exception as e:
                    print(f"Não foi possível ler o arquivo {caminho_relativo}: {e}")
                    continue
            except Exception as e:
                print(f"Erro ao processar o arquivo {caminho_relativo}: {e}")
                continue

            # Formata o conteúdo no estilo especificado
            bloco = f"```{caminho_relativo}\n{conteudo}\n```\n\n"
            conteudo_total += bloco

    return conteudo_total

def salvar_conteudo_em_txt(conteudo, nome_arquivo='todos_os_arquivos.txt'):
    """
    Salva o conteúdo coletado em um arquivo de texto.
    """
    try:
        with open(nome_arquivo, 'w', encoding='utf-8') as f:
            f.write(conteudo)
        print(f"Conteúdo salvo com sucesso em {nome_arquivo}")
    except Exception as e:
        print(f"Erro ao salvar o arquivo {nome_arquivo}: {e}")

if __name__ == "__main__":
    diretorio_atual = os.getcwd()
    print(f"Percorrendo diretório: {diretorio_atual}")

    # Carrega os padrões do .gitignore, se existir
    carregar_gitignore(diretorio_atual)

    conteudo = coletar_conteudos(diretorio_atual)
    salvar_conteudo_em_txt(conteudo, NOME_ARQUIVO_SAIDA)
