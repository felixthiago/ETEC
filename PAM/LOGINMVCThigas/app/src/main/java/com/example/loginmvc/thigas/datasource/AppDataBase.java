package com.example.loginmvc.thigas.datasource;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

import com.example.loginmvc.thigas.datamodel.UsuarioDataModel;

public class AppDataBase extends SQLiteOpenHelper {
    SQLiteDatabase db;
    public static final String DB_NAME = "MVC.sqlite";
    public static int version = 1;
    public AppDataBase(Context context) {
        super(context,DB_NAME,null,version);
        db = getWritableDatabase();
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(UsuarioDataModel.criarTabela());
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }
    public boolean inserir(String tabela, ContentValues dados){
        db = getWritableDatabase();
        boolean retorno = false;
        try {
            retorno = db.insert(tabela,null,dados)>0;
        } catch (Exception e) {
            e.getMessage();
        }
        return retorno;
    }
    public boolean checkUserPass(String email, String senha){
        db = getWritableDatabase();
        Cursor cursor = db.rawQuery("SELECT * FROM usuarios WHERE email = ? AND senha = ?",
                new String[]{email,senha});
        return cursor.getCount()>0;
    }
    public boolean checkUser(String email){
        db = getWritableDatabase();
        Cursor cursor = db.rawQuery("SELECT * FROM usuarios WHERE email = ?",
                new String[]{email});
        return cursor.getCount()>0;
    }
}
