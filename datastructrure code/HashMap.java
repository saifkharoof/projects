package DD;


public class HashMap {

	private class node {// a class for the nodes for the linked list
		
		public Info person;
		public node next;
		
		
		 node (Info person) {
			this.person = person;
		}
		
	}
	
	private class Info {// a class to store the information of the people 
		
		public String name;
		public int age;
		
		 Info (String name, int age) {
			this.name = name;
			this.age = age;
		}
		
	}
	
	private node head[] = new node[10];// array of heads for each linked list
	
	private int index (String name) {// method for finding the index or the value of a certain name
		
		    int sum=0;
		    for(int i=0; i<name.length(); i++)
		    {
		    	
		      int asciiValue = name.charAt(i);
		      sum = sum+ asciiValue;
		 
		    }
		    
		  
		return sum%head.length;
	}
	
	
	public void insert(String value, int age) {//the insertion method
		
		if(value.isEmpty()) {// if he does not enter any name give him an error
			throw new IllegalAccessError();
		}

		Info name = new Info(value, age); //object for storing the information
		int place = index(value);
		node newNode = new node(name); //object for putting the new node
		node i = head[place];

		if (head[place] == null) {

			head[place] = newNode;
			
		}
		else {
		
			 while (i.next != null) {
				  i = i.next; 
			 }
			 i.next = newNode;
		}
	
		
	}
	
		
	public void remove (String value) {// method for removing the element
		
		if (value.isEmpty()) {// if he does not enter any name give him an error
		throw new IllegalAccessError();
		}
		
		int place = index(value);
	

				if(head[place] != null) {
				node old = null;//initilaize node old 
				node k = head[place]; 
				while (k.next != null) {
					old = k;
					k = k.next;
				}
				if (k.person.name.equals(value)) {
					if(old == null) {
						head[place] = k.next;
					} 
					else {
						old.next = k.next;
					}
				}
		}
		} 
	

	
	public boolean search (String value) {// method for searching for the object
		
		int place = index(value);
		
		
		if (value.isEmpty()) { // if he does not enter any name give him an error
			throw new IllegalAccessError();
		}
		
			while (head[place] != null) {
		if (head[place].person.name.contentEquals(value)) {
			
			return true;
			
		}
			head[place]  = head[place].next;
		}
			
	return false;
	}
	

	public void print() {// method to print the hashmap
		
		System.out.print("[");

		for(int j = 0 ; j < head.length ; j++ ) {// for loop to go through all the heads available
			node i = head[j];
		while (i != null) {//traverse
			System.out.print(i.person.name + " " +i.person.age + ",");
			i = i.next;
		}
		}
		
		
		System.out.println("]");
	}

}

