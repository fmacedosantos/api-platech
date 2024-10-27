### Dependências

- Ative o Rewrite Mode no apache para a manipulação da URL

No Linux, no diretório de criação de projetos, rode:
```bash
sudo a2enmod rewrite
```

No Windows, pegue o httpd.conf, copie e cole em xampp/apache/conf (não esqueça de tirar excluir o httpd.conf original)
- Instale o PHP Composer
- Rode no terminal do projeto:
```bash
composer update
```