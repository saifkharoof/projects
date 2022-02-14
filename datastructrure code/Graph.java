package DD;

public class Graph{
		
		class Edge {// class for the edge info
			 int src, dest, weight;
			
			Edge(){
				src = dest = weight = 0; // inistialize the varibles
			}
		}
	
		private int v; 
		private int e;
		Edge edge[]; 
		
		Graph (int v , int e){  // constructor for the graph to store the vertex and edges 
			this.v = v;
			this.e = e;
			edge = new Edge[e];
			   for (int i = 0; i < e; ++i) {
		            edge[i] = new Edge();
		           }
		}
		
		public void bellmenFord(Graph graph, int src){ // method for the bellman ford to find the shortest path
		
			int vr = graph.v, e = graph.e;
			int d[] = new int[vr];
			int p[] = new int[vr]; //insializing the variablas to the size of the number of vertex
			
			for (int i = 0; i < vr; i++) {//insializing the variablas the src to zero all to infinity
				d[i] = Integer.MAX_VALUE;
				d[src] = 0;
			}
			
			
	        for (int i = 0; i < vr-1; i++) {// starting to go through all vertex v-1 time

	            for (int j = 0; j < e; j++) {
		        
	                int u = graph.edge[j].src;
	                int v = graph.edge[j].dest;
	                int weight = graph.edge[j].weight;
	                if (d[u] != Integer.MAX_VALUE && d[u] + weight < d[v]) {//relaxing part and error handling if the destnation was infinite
	                    d[v] = d[u] + weight;
	                	p[v] = u;
	                }
	                
	            }
	            	
	        }
	        
	        System.out.println("Vertex Distance from Source");
	        for (int i = 0; i < vr; i++)
	            System.out.println(i + "\t\t" + p[i]);
		}
		

}
