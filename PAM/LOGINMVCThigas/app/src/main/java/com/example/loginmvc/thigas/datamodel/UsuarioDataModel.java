package com.example.loginmvc.thigas.datamodel;

public class UsuarioDataModel {
    public static final String TABELA = "usuarios";
    public static final String ID = "id";
    public static final String NOME = "nome";
    public static final String EMAIL = "email";
    public static final String SENHA = "senha";
    public static String queryCriarTabela = "";

    public static String criarTabela(){
        queryCriarTabela+="CREATE TABLE "+ TABELA +"(";
        queryCriarTabela+= ID+ " INTEGER PRIMARY KEY AUTOINCREMENT,";
        queryCriarTabela+= NOME + " varchar(50),";
        queryCriarTabela+= EMAIL + " varchar(50),";
        queryCriarTabela+= SENHA + " varchar(50)";
        queryCriarTabela+=")";

        return queryCriarTabela;
    }
}
