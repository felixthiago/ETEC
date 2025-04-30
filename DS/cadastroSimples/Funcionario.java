public class Funcionario extends PessoaFisica{
    private String cartao;
    private long salario;

    public void setCartao(String cartao){
        this.cartao = cartao;
    }

    public void setSalario(long salario){
        this.salario = salario;
    }

    public String getCartao(){
        return cartao;
    }


    public long getSalario(){
        return salario;
    }
}
