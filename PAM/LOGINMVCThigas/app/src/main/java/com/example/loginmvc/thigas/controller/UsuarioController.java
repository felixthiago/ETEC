package com.example.loginmvc.thigas.controller;

import android.content.ContentValues;
import android.content.Context;
import com.example.loginmvc.thigas.datasource.AppDataBase;
import com.example.loginmvc.thigas.datamodel.UsuarioDataModel;
import com.example.loginmvc.thigas.model.Usuario;
import java.util.Collections;
import java.util.List;

public class UsuarioController extends AppDataBase implements ICrud<Usuario> {
    ContentValues dadosObjeto;
    public UsuarioController(Context context) {
        super(context);
    }

    @Override
    public boolean incluir(Usuario obj) {
        dadosObjeto = new ContentValues();
        dadosObjeto.put(UsuarioDataModel.NOME, obj.getNome());
        dadosObjeto.put(UsuarioDataModel.EMAIL, obj.getEmail());
        dadosObjeto.put(UsuarioDataModel.SENHA, obj.getSenha());

        return inserir(UsuarioDataModel.TABELA, dadosObjeto);
    }

    @Override
    public boolean alterar(Usuario obj) {
        return false;
    }

    @Override
    public boolean deletar(Usuario obj) {
        return false;
    }

    @Override
    public List<Usuario> listar() {
        return Collections.emptyList();
    }

    public boolean checaUsuario(String user){
        return checkUser(user);
    }
    public boolean checaSenha(String email, String senha){
        return checkUserPass(email,senha);
    }
}