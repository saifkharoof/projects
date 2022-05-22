package task2.oop;

public class Supra extends SportsCar{
	
	 int additionalHp, additioalTourqe;
	
	public Supra () {
		additioalTourqe = 300;
		additionalHp = 400;
	}
	
	@Override
	public int getHp () {
		return baseHp+additionalHp;	
	}
	
	@Override
	public int getTourqe () {
		return baseTourqe+additioalTourqe;
	}
	
	@Override
	public int getSpeed() {
		return 280;
	}
}

