package testauto_cartao;


import java.util.concurrent.TimeUnit;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class Auto_Cadastrar_Cartao {

	public static void main(String[]args) {
		System.setProperty("webdriver.chrome.driver", "C:\\selenium\\chromedriver32\\chromedriver.exe");

		WebDriver driver =new ChromeDriver(); //Chamar o chrome
		//site
		driver.get("file:///C:/Users/Naiara/Desktop/adicionar%20cartoes/adicionarcartoes.html");
		//esperar
		driver.manage().timeouts().implicitlyWait(5,TimeUnit.SECONDS);
		
		//usuário
		driver.findElement(By.id("nome-titular")).sendKeys("João da Silva");
		driver.manage().timeouts().implicitlyWait(2,TimeUnit.SECONDS);
		
		//senha
		driver.findElement(By.id("numero-cartao")).sendKeys("123456789101245");
		driver.manage().timeouts().implicitlyWait(2,TimeUnit.SECONDS);
		driver.findElement(By.id("bandeira-cartao")).sendKeys("VISA");
		driver.findElement(By.id("validade-cartao")).sendKeys("juin");
		//driver.findElement(By.id("validade-cartao")).sendKeys("2022-08");



		
		//clicar em entrar
		driver.findElement(By.id("btn")).click();					


		
	}
}
