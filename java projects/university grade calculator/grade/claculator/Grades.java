package task3.grade.claculator;

import java.util.Scanner;

public class Grades {

	public static void main(String[] args) {
		
		System.out.println("enter how many subjects do you took: ");
		
		Scanner userNum = new Scanner(System.in);
		int numOfCourses = userNum.nextInt(); //coding standard for variables naming convention and its the numbers for how many courses 
		
		double sum, avg;
		double[] grades = new double[numOfCourses];
		
		System.out.println("enter the grades please(2.4 or 3.2 or 4.0): ");
		
		Scanner userGrade = new Scanner (System.in);
		
		for (int i = 0; i < grades.length ; i++) {
			grades[i] = userGrade.nextDouble();
		}
		
		userGrade.close();
		userNum.close();
		
		sum = calaculateSummation(grades);
		avg = calculateAverage(grades, sum);
		
		System.out.println("your avg is: " + avg);
		
			if ( avg < 2.4) {
			
			System.out.println("you got a U");
			
		}	else if (avg >= 2.4 && avg <= 2.79 ) {
			
			System.out.println("you got a P");
			
		} 	else if (avg >= 2.8 && avg <= 3.59 ) {
			
			System.out.println("you got a M");
			
		} 	else if (avg >= 3.6 && avg <= 4.0 ) {
			
			System.out.println("you got a D");
		
		}
		
	}

	public static double calaculateSummation(double grades[]) {  //coding standard for methods naming convention
		
		double sum = 0.0;
		for (int i = 0; i < grades.length ; i++) {
			sum += grades[i];
		}
		return sum;
		
	}
	
	public static double calculateAverage (double grades[] , double sum) { //coding standard for methods naming convention
		sum = calaculateSummation(grades);
		return  (sum/(grades.length)); // calculate the average and return it 
	}

	}


