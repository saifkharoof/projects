package task2.oop;

public class R34  extends SportsCar{
	
	 int hpMulti,torqueMulti;
	
	public R34 () {
		hpMulti = 4;
		torqueMulti = 4; 
	}
	
	@Override
	public int getHp() {
		return baseHp*hpMulti;
	}
	
	@Override
	public int getTourqe () {
		return baseTourqe*torqueMulti;
	}
	
	@Override
	public int getSpeed() {
		return 320;
	}
}
