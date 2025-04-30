package br.com.fabioclaret.etimpamiifragmentscomkotlin

import android.os.Bundle
import com.google.android.material.tabs.TabLayout
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import br.com.fabioclaret.etimpamiifragmentscomkotlin.databinding.ActivityMainBinding

class MainActivity : AppCompatActivity() {
    private lateinit var binding: ActivityMainBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()

        binding = ActivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)

        binding.tableLayout.addOnTabSelectedListener(
            object : TabLayout.OnTabSelectedListener {
                override fun onTabSelected(tab: TabLayout.Tab?) {
                    when (tab?.position) {
                        0 -> supportFragmentManager
                            .beginTransaction()
                            .replace(R.id.fragmentContainerview, FirstFragment())
                            .commit()
                        1 -> supportFragmentManager
                            .beginTransaction()
                            .replace(R.id.fragmentContainerview, SecondFragment())
                            .commit()
                        2 -> supportFragmentManager
                            .beginTransaction()
                            .replace(R.id.fragmentContainerview, ThirdFragment())
                            .commit()
                    }

                }

                override fun onTabUnselected(tab: TabLayout.Tab?) {
                }

                override fun onTabReselected(tab: TabLayout.Tab?) {
                }
            }
        )

        ViewCompat.setOnApplyWindowInsetsListener(binding.main) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
    }
}