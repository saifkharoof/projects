package task1.algorthim;

import java.util.Scanner;

public class Encryption {

	public static void main(String[] args) {
		
		int key = 4; //this is how much you want to pivot the characters of the string 
		
		System.out.println("enter the word you want to encrypt: ");
		String text = new String();
		Scanner userEncrypt = new Scanner(System.in); //coding standard for variables naming convention
		text = userEncrypt.nextLine(); // users text and coding standard for variables naming convention
		userEncrypt.close();
		
		char encrypetedPieces[] = text.toCharArray(); //converting the String into array of characters
		
		for ( int i = 0; i < encrypetedPieces.length ; i++) { //change the value according to ascii table and encrypt it
			encrypetedPieces[i] -= key;
		}
	
		System.out.print("the encrypted value ");
		System.out.print(encrypetedPieces);
		System.out.println();
		
		for (int j = 0; j < encrypetedPieces.length; j++) { //change the value according to ascii table and decrypt it
			encrypetedPieces[j] +=key;
		}
		
		System.out.print("the decrybted value ");
		System.out.print(encrypetedPieces);
	}
	}


