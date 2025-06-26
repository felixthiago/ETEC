package android.thigas.sharedpreferences

import android.graphics.Color
import android.os.Bundle
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import com.google.android.material.snackbar.Snackbar
import android.view.View
import android.thigas.sharedpreferences.databinding.ActivityMainBinding

class MainActivity : AppCompatActivity() {

    private lateinit var binding: ActivityMainBinding

    companion object {
        const val NOME_ARQUIVO = "arquivo_prefes.xml"
    }

    private var cor = ""

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()

        // ViewBinding
        binding = ActivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)

        // Botões de cores
        binding.btnCor1.setOnClickListener {
            cor = "#0B5FF0"
            salvarCor(cor)
        }

        binding.btnCor2.setOnClickListener {
            cor = "#003185"
            salvarCor(cor)
        }
        binding.btnCor3.setOnClickListener {
            cor = "#0B22F0"
            salvarCor(cor)
        }
        binding.btnCor4.setOnClickListener {
            cor = "#080475"
            salvarCor(cor)
        }

        binding.btnCor5.setOnClickListener {
            cor = "#390781"
            salvarCor(cor)
        }

        // Botão para salvar no SharedPreferences
        binding.btnTrocar.setOnClickListener { view ->
            val preferencias = getSharedPreferences(NOME_ARQUIVO, MODE_PRIVATE)
            val editor = preferencias.edit()
            editor.putString("cor", cor)
            editor.putString("nome", "thigas")
            editor.putInt("idade", 18)
            editor.apply()
            snackBar(view)
        }
    }

    override fun onResume() {
        super.onResume()
        val preferencias = getSharedPreferences(NOME_ARQUIVO, MODE_PRIVATE)
        val corSalva = preferencias.getString("cor", "")

        if (!corSalva.isNullOrEmpty()) {
            binding.layoutPrincipal.setBackgroundColor(Color.parseColor(corSalva))
        }
    }

    private fun salvarCor(cor: String) {
        binding.layoutPrincipal.setBackgroundColor(Color.parseColor(cor))
    }

    private fun snackBar(view: View) {
        val snackbar = Snackbar.make(view, "Cor de fundo alterada com sucesso!", Snackbar.LENGTH_SHORT)
        snackbar.setAction("OK") {
            // Ação opcional
        }
        snackbar.setActionTextColor(Color.GREEN)
        snackbar.show()
    }
}