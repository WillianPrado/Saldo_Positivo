// Generated by Selenium IDE
const { Builder, By, Key, until } = require('selenium-webdriver'); // Importando dependencias do Selenium

describe('index', function() {
    this.timeout(30000)
  
    let driver
  
    beforeEach(async function() {
        driver = await new Builder().forBrowser('chrome').build();
    });

    async function cadastrar_novo_cartao(){
        await driver.get("http://localhost/SaldoPositivo");
        await driver.findElement(By.id("email_logar")).click();
        await driver.findElement(By.id("email_logar")).sendKeys("jheymisonbao@live.com");
        await driver.findElement(By.id("senha_logar")).click();
        await driver.findElement(By.id("senha_logar")).sendKeys("Misson201369");
        await driver.findElement(By.css(".btn:nth-child(3)")).click();
        await driver.get("http://localhost/SaldoPositivo/main.php?page=cartoes&sec=cadastrar_cartoes");
        await driver.findElement(By.id("titulo_cartao")).sendKeys("Cartão Nubank");
        await driver.findElement(By.id("banco")).sendKeys("Nubank");
        await driver.findElement(By.css(".filter-option-inner-inner")).click();
        await driver.findElement(By.xpath("//div/div/div/div/ul/li[2]/a")).click();
        await driver.findElement(By.id("limite")).sendKeys("1200");
        await driver.findElement(By.id("limite_disponivel")).sendKeys("1000");
        await driver.findElement(By.css(".btn-primary")).click();
    }

    it('index', async function() {
        cadastrar_novo_cartao(); //Aplicando a função
    });
 
})
