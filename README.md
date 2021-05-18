Estrutura das pastas:
nome_do_projeto/
|--- doc/
|--- layout/
|--- sql/

|--- www/
	|--- cache/
	|--- galeria/
	|--- lib/
	|--- modulos/
	|--- templates/



+ A pasta raiz é de o nome identificador do seu projeto. Eu sempre uso nome da empresa cliente, exemplo: petrobras/.

+ doc é a pasta que contém todos os documentos relacionados ao projeto: contrato, anotações de idéias, propostas, leiame com as configurações para que o sistema funcione corretamente, etc.

+ layout é a pasta que contém o layout “cru”, pronto para ser desmontado em html e jogado na programação. Contém também os arquivos de edição originais, exemplo arquivos de photoshop.

+ sql contém os .sql com a estrutura do banco de dados e também dumps de backup.

+ www onde fica o principal: códigos, layout montado, bibliotecas, galeria, etc:
+ www/galeria – fotos dos itens do sistema. Exemplo: numa loja virtual, há as fotos dos produtos, então dentro da galeria tem mais uma pasta chamada produtos que por sua vez contém as fotos dos produtos.
+ www/lib – todas as classes de framework e funcionalidades em geral ficam aqui armazenadas.
+ www/modulos – classes das seções do sistema (módulos).

+ www/templates – toda a parte estética fica armazenada aqui. Normalmente contém as pastas:
css, imagens, flash e js. São auto-explicativas.


