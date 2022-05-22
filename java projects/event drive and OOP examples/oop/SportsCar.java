package task2.oop; //coding standard for packages naming convention

public abstract class SportsCar { //coding standard for classes naming convention
	
	 int baseHp , baseTourqe; //coding standard for variables naming convention
	
	public SportsCar () { 
		baseHp = 300; //coding standard for variables naming convention
		baseTourqe = 200; //coding standard for variables naming convention
	}

	public int getHp() { //coding standard for methods naming convention
		return baseHp; //coding standard for variables naming convention
	}

	public int getTourqe() { //coding standard for methods naming convention
		return baseTourqe;//coding standard for variables naming convention
	}
	
	public abstract int getSpeed(); //coding standard for methods naming convention
}
