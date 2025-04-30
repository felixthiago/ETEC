//TIP To <b>Run</b> code, press <shortcut actionId="Run"/> or
// click the <icon src="AllIcons.Actions.Execute"/> icon in the gutter.
public class Main {
    public static void main(String[] args) {
        Funcionario funcionario = new Funcionario();

        funcionario.setNome("Thiago");
        funcionario.setCpf(1111111);
        funcionario.setRG("12.345.678-X");
        funcionario.setCartao("0PI42069UM");
        funcionario.setSalario(4200);


        System.out.println("Nome > " + funcionario.getNome());
        System.out.println("CPF > " + funcionario.getCpf());
        System.out.println("RG > " + funcionario.getRG());
        System.out.println("Cartao > " + funcionario.getCartao());
        System.out.println("Salario > R$ " + funcionario.getSalario());
    }
}