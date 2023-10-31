import data.productcatalog.ProductTemplate;
import java.io.*; 
class Serialize 
{ 
    public static void main(String[] args) 
    {
        ProductTemplate object = new ProductTemplate(args[0]); 
        String filename = "payload.ser"; 
        // Serialization  
        try
        {    
            //Saving of object in a file 
            FileOutputStream file = new FileOutputStream(filename); 
            ObjectOutputStream out = new ObjectOutputStream(file); 
              
            // Method for serialization of object 
            out.writeObject(object);    
            out.close(); 
            file.close(); 
            System.out.println("Object has been serialized"); 
        } 
          
        catch(IOException ex) 
        { 
            System.out.println("IOException is caught"); 
        }
}
}