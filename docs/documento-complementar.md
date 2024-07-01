### Resiliência:
##### O que fazer para mitigar possíveis erros e controlar os erros recebidos da API?

Para mitigar possíveis erros, foi criado testes para garantir o funcionamento do sistema. É sugerido incluir esses testes na pipeline de deploy.

Além disso, podemos adicionar uma ferramenta de monitoramento de logs, como o CloudWatch ou Sentry. Implementar rotinas nos blocos try...catch para registrar logs sempre que o sistema gerar um erro, facilitando a análise posterior.

Também utilizamos técnicas de clean code para melhorar a legibilidade e entendimento do código por outros desenvolvedores, mitigando futuros erros.

### Performance:
##### Quais boas práticas são aplicadas em banco de dados e no código para garantir performance?

Para otimizar a performance do sistema, foi adicionado índices às chaves estrangeiras (FKs) nas tabelas do banco de dados.

É recomendado também o uso de sistemas de cache para armazenar informações que não são alteradas frequentemente, como posts, tags e categorias, reduzindo a necessidade de acessos constantes ao banco de dados.

Também utilizaria a estratégia de compressão de imagens ou até mesmo o carregamento das imagens de forma assíncrona para evitar bloqueios no processo principal de carregamento de conteúdo.

### Segurança:
##### Como garantir segurança para as APIs do sistema?

Para garantir a segurança do sistema o ideal seria implementar um mecanismo de autenticação e autorização usando JWT, protegendo rotas sensíveis do sistema, como a edição de dados de um post, permitindo acesso a alteração de posts ou perfil de usuários apenas aos usuários administradores ou os próprios usuários.

Validação de entrada de dados pelas requests para evitar ataques como SQL injection.

Limitar o número de requisições por usuário para mitigar potenciais ataques de DDOS.

### Simultaneidade:
##### Como lidar com simultaneidade quando milhares de requisições são solicitadas ao mesmo tempo?

Utilizaria uma ferramentas de controle e balanceamento de carga, como load balancers, para distribuir o tráfego de forma equilibrada entre os servidores disponíveis.

Utilizar estratégias de cache para conteúdos e páginas, maximizando o desempenho ao reduzir a carga sobre os recursos do servidor.
