package com.example.loginmvc.thigas;

import android.os.Bundle;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;
import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.loginmvc.thigas.model.Usuario;
import com.example.loginmvc.thigas.controller.UsuarioController;
import com.example.loginmvc.thigas.R;


public class MainActivity extends AppCompatActivity {
    Usuario usuario;
    UsuarioController usuarioController;
    EditText nomeInsert,senhaInsert,emailInsert;
    Button cadastrar, logar;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_main);

        initComponents();

        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });
        logar.setOnClickListener(view->{
            if (validarCampos()){
                usuario = new Usuario();
                String email = emailInsert.getText().toString();
                String senha = senhaInsert.getText().toString();

                usuario.setEmail(email);
                usuario.setSenha(senha);

                usuarioController = new UsuarioController(this);

                boolean isCheckSenha = usuarioController.checaSenha(email,senha);
                boolean isCheckUser = usuarioController.checaUsuario(email);
                if(!isCheckUser){
                    Toast.makeText(MainActivity.this,"Usuario ainda Não cadastrado", Toast.LENGTH_LONG).show();
                }else {
                    if(!isCheckSenha){
                        Toast.makeText(MainActivity.this,"Email ou senha incorretos", Toast.LENGTH_LONG).show();

                    }else {
                        Toast.makeText(MainActivity.this,"Logado com sucesso", Toast.LENGTH_LONG).show();
                        Intent home = new Intent(MainActivity.this, HomeActivity.class);
                        startActivity(home);
                    }
                }
            }else{
                Toast.makeText(MainActivity.this,"Preencha todos os campos", Toast.LENGTH_LONG).show();
            }
        });

        cadastrar.setOnClickListener(view->{
            if (validarCampos()){
                usuario = new Usuario();
                String email = emailInsert.getText().toString();
                String senha = senhaInsert.getText().toString();
                String nome = nomeInsert.getText().toString();

                usuario.setNome(nome);
                usuario.setEmail(email);
                usuario.setSenha(senha);

                usuarioController = new UsuarioController(this);

                boolean isCheckUser = usuarioController.checaUsuario(email);
                if (isCheckUser){
                    Toast.makeText(MainActivity.this,"Esse usuario ja existe, tente entrar", Toast.LENGTH_LONG).show();
                }else{
                    boolean cadastrado = usuarioController.incluir(usuario);
                    if (cadastrado){
                        Toast.makeText(MainActivity.this,"Usuario cadastrado com sucesso", Toast.LENGTH_LONG).show();
                        Intent home = new Intent(MainActivity.this, HomeActivity.class);
                        startActivity(home);
                    }else {
                        Toast.makeText(MainActivity.this,"Erro ao cadastrar usuario, tente novamente mais tarde", Toast.LENGTH_LONG).show();
                    }
                }
            }
        });


    }
    private boolean validarCampos(){
        boolean validar = false;
        if (nomeInsert.getText().toString().isEmpty()
                || emailInsert.getText().toString().isEmpty()
                || senhaInsert.getText().toString().isEmpty()
        ){
            validar = false;
        }else {
            validar = true;
        }
        return validar;
    }
    private void initComponents(){
        nomeInsert = findViewById(R.id.nomeInsert);
        emailInsert = findViewById(R.id.emailInsert);
        senhaInsert = findViewById(R.id.passwordInsert);
        cadastrar = findViewById(R.id.cadastrar);
        logar = findViewById(R.id.login);
    }
}