package task2.oop; //coding standard for packages naming convention

import java.util.Scanner;

public class GameTester { // coding standard for classes naming convention

	public static void main(String[] args) {
		
		System.out.println("enter how many players you want: ");
		Scanner user = new Scanner(System.in);
		int userName = user.nextInt(); // this variable for the counter for the users and coding standard for variables naming convention
		
		for (int i = 0; i <userName; i++) {
	
			System.out.println("enter which car you want \n 1) supra \n 2) r34 ");
			Scanner user2 = new Scanner(System.in);
			int userName2 = user.nextInt(); // this variable is for the user choice and coding standard for variables naming convention
			
			if (userName2 == 1 ) {
				
				SportsCar supra = new Supra();
				System.out.println("the total HP is:  " + supra.getHp() + "\n"+"the total tourque is: " + supra.getTourqe() + "\n" + "your max speed is: " + supra.getSpeed() + " km/h" +"\n" );
				
			} else if (userName2 == 2){
				
				SportsCar r34 = new R34();
				System.out.println("the total HP is:  " + r34.getHp() + "\n" +"the total tourque is: " + r34.getTourqe() + "\n" +"your max speed is: " + r34.getSpeed() + " km/h" +"\n" );
				
			} else {
				System.out.println("invaild input");
			}
		}

	}

}
