import java.sql.*;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DatabaseConnection
{
    public static void main(String [] args)
    {
        //Constants
        final String url = "jdbc:mysql://dijkstra.ug.bcc.bilkent.edu.tr:3306/bora_cun";
        final String user = "bora.cun";
        final String pass = "DPZ3a7Km";

        //Variables
        String errorMessage;

        //Program
        
        try
        {
            Class.forName("com.mysql.cj.jdbc.Driver");

            //Connection
            System.out.println("Connecting to the database...");
            Connection con = DriverManager.getConnection(url, user, pass);
            System.out.println("Connection successful...");

            Statement stmt = con.createStatement();
            ResultSet rs = stmt.executeQuery("select * from student");

            while(rs.next())
                System.out.println(rs.getInt("sid") + " " + rs.getString("sname") + " " + rs.getString("bdate"));
            con.close();
        }
        catch(Exception e)
        {
            errorMessage = e.toString();
            if (errorMessage.contains("Access denied"))
                System.out.println("Wrong login information.");
            else if (errorMessage.contains("driver found"))
                System.out.println("Wrong URL.");
        }
        

        
    }
}