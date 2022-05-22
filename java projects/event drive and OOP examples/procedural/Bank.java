package task2.procedural; //coding standard for packages naming convention

import java.util.Scanner;

public class Bank { //coding standard for classes naming convention

	public static void main(String[] args) {
		
		System.out.println("enter your name: ");
		
		String custmorName = new String();
		Scanner user= new Scanner(System.in);
		custmorName = user.nextLine(); //coding standard for variables naming convention and this variable for the customer name
		
		System.out.println("enter your password: ");
		String password = "942001";
		String userPassword = new String();
		userPassword = user.nextLine(); // variable for the password
		
			
		if (userPassword.equals(password)) { // checking the password
			
		System.out.println(custmorName + ", enter the type of type of transaction you want \n 1) deposit \n 2) withdraw ");
		System.out.println("you have right now: " + checkBaseMoney());
		
		Scanner userNum = new Scanner(System.in); 
		int num = userNum.nextInt(); // user choice for transaction and coding standard for variables naming convention
		
						if (num == 1 ) {
			
			System.out.println("enter how much you want to deposit please: ");
			Scanner userNum2 = new Scanner(System.in); 
			int num2 = userNum2.nextInt(); // user choice for how money and coding standard for variables naming convention
			
			System.out.println("you have right now: " + depositMoney(num2));
			
		} else if (num == 2) {
			
			System.out.println("enter how much you want to withdraw please: ");
			Scanner userNum2 = new Scanner(System.in); 
			int num2 = userNum2.nextInt(); // user choice for how money and coding standard for variables naming convention
			
			if (withdrawMoney(num2) >= 0) {
				
			System.out.println("you have right now: " + withdrawMoney(num2));
			
			} else if (withdrawMoney(num2) < 0) {
				
			System.out.println("you can't withdraw ");
				
		} else {
			System.out.println("invalid input");
		}
			
		}
						} else {
							System.out.println("wrong password!");
						}
		 
	}
	
	public static int checkBaseMoney() { // base money and coding standard for methods naming convention 
		return 500;
	}
	
	 public static int depositMoney(int transactioMoney) { // calculate the added money and coding standard for methods naming convention
		 int baseMoney = checkBaseMoney();
		return baseMoney + transactioMoney;
	}
	 
	 public static int withdrawMoney(int transactioMoney) { //calculate the removed money and coding standard for methods naming convention
		 int baseMoney = checkBaseMoney();
		 return baseMoney - transactioMoney;
	 }

	}


