package task2.eventdriven;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import task2.procedural.Bank;

public class Procedual implements ActionListener{

	@Override
	public void actionPerformed(ActionEvent e) {
		
		Bank.main(null);
	}
	

}
