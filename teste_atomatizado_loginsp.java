package loginsaldo;

import java.util.concurrent.TimeUnit;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class  Login_Saldo_Positivo{

	public static void main(String[]args) {
		System.setProperty("webdriver.chrome.driver", "C:\\selenium\\chromedriver32\\chromedriver.exe");

		WebDriver driver =new ChromeDriver(); //Chamar o chrome
		//site
		driver.get("file:///C:/Users/Naiara/Desktop/login%20e%20cadastro/login/loginsp.html");
		//esperar
		driver.manage().timeouts().implicitlyWait(5,TimeUnit.SECONDS);
		
		//usuário
		driver.findElement(By.id("loginemail")).sendKeys("João Silva");
		driver.manage().timeouts().implicitlyWait(3,TimeUnit.SECONDS);
		
		//senha
		driver.findElement(By.id("loginsenha")).sendKeys("123456");
		driver.manage().timeouts().implicitlyWait(3,TimeUnit.SECONDS);
		
		//clicar em entrar
		driver.findElement(By.id("loginbtn")).click();					


		
	}
}
