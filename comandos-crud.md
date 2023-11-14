# Comando SQL para operações de dados (CRUD)

## Resumo

- C: CREATE (INSERT) -> usado para inserir dados
- R: READ (SELECT) -> usado para ler/consultar dados
- U: UPDATE (UPDATE) -> usado para atualizar dados
- D: DELETE (DELETE) -> usado para excluir dados


## Exemplos


### INSERT na tabela de usuarios
```sql
INSERT INTO usuarios (nome, email, senha, tipo)
VALUES('jean dos santos',
    'jean@jean.com',
    '123456',
    'admin'
);

INSERT INTO usuarios(nome, email, senha, tipo)
VALUES(
    'Fulano da Silva',
    'fulano@gmail.com',
    '456',
    'editor'
),

(
    'Beltrano Soares',
    'beltrano@msn.com',
    '000penha',
    'admin'
),

(
    'Chapolin Colorado',
    'chapolin@vingadores.com.br',
    'marreta',
    'editor'
);
```

### SELECT na tabela de usuários

SELECT * FROM usuarios;

SELECT nome, email FROM usuarios;

SELECT nome, email FROM usuarios WHERE tipo = 'admin';

### UPDATE em dados da tabela de usuários

UPDATE usuarios SET tipo = 'admin'
WHERE id = 4;

-- Obs: NUNCA ESQUEÇA DE PASSAR UMA CONDIÇÃO PARA O UPDATE!


### DELETE em dados da tabela de usuários

DELETE FROM usuarios WHERE id = 2;


-- Obs: NUNCA ESQUEÇA DE PASSAR UMA CONDIÇÃO PARA O DELETE!

### INSERT na tabela de notícias

INSERT INTO noticias(titulo, resumo, texto, imagem, usuario_id)
VALUES(
    'Descoberto oxigênio em Vênus',
    'Recentemente a telescópio no Havaí XYZ encontrou traços de oxigênio no planeta',
    'Nesta manhã, em um belo dia para a astronomia, foi feita uma descoberta incríbel e muito bacana demais da conta que legal...',
    'venus.jpg',
    1
);

INSERT INTO noticias(titulo, resumo, texto, imagem, usuario_id)
VALUES(
    'Nova versão do VSCode',
    'Recentemente foi atualizado...',
    'A Microsoft trouxe recursos de Inteligência Artificial...',
    'vscode.png',
    4
);

INSERT INTO noticias(titulo, resumo, texto, imagem, usuario_id)
VALUES(
    'Onda de calor no Brasil',
    'Temperaturas muito acima da média',
    'Efeitos do aquecimento global estão prejudicando a vida...',
    'sol.svg',
    3
);

### Objetivo: consulta que mostre a data e o título da notícia e o nome do autor desta notícia.

#### SELECT COM JOIN (CONSULTA COM JUNÇÃO DE TABELAS)

SELECT 
    noticias.data,
    noticias.titulo,
    usuarios.nome


-- Especificamos quais tabelas serão "Juntadas / Combinadas"

FROM noticias JOIN usuarios

-- Critério para o JOIN funcionar:
-- Fazemos uma comparação entre a chave estrangeira (FK)
-- com a chave primária (PK)

ON noticias.usuario_id = usuarios.id

-- Opcional (Ordenação/Classificação pela data)
-- DESC indica ordem decrescente (mais recente vem primeiro)
ORDER BY data DESC;