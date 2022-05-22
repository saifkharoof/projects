package task2.eventdriven; //coding standard for packages naming convention

import javax.swing.*;

import java.awt.event.*;

import task2.oop.*;

import task2.procedural.*;

public class ProgrammingParadigms { //coding standard for classes naming convention

	public static void main(String[] args) {
		
		JFrame myFrame =  new JFrame("Programming paradaims"); //coding standard for variables naming convention
		myFrame.setVisible(true);
		myFrame.setLayout(null);
		myFrame.setSize(600,500);
		
		JButton oop = new JButton ("OOP"); //coding standard for variables naming convention
		oop.setBounds(200,60,200,100);
		myFrame.add(oop);

		JButton procedual = new JButton ("procedual"); //coding standard for variables naming convention
		procedual.setBounds(200,180,200,100);
		myFrame.add(procedual);
		
		JButton suprise = new JButton ("suprise"); //coding standard for variables naming convention
		suprise.setBounds(200,300,200,100);
		myFrame.add(suprise);
		
		oop.addActionListener(new Oop());
		
		procedual.addActionListener(new Procedual());
		
		suprise.addActionListener(new Suprise());

	}

}
