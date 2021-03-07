import java.sql.*;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

import javax.lang.model.util.ElementScanner6;

public class DatabaseConnection
{
    public static void main(String [] args) throws SQLException
    {
        //Constants
        final String url = "jdbc:mysql://dijkstra.ug.bcc.bilkent.edu.tr:3306/bora_cun";
        final String user = "bora.cun";
        final String pass = "DPZ3a7Km";
        final String divider = "---------------------------------------------------------------------";

        //Variables
        String errorMessage;

        //Program
        try
        {
            Class.forName("com.mysql.cj.jdbc.Driver");

            //Connection
            System.out.println("Connecting to the database...");
            Connection con = DriverManager.getConnection(url, user, pass);
            System.out.println("Connection successful.");

            System.out.println(divider);

            //Statement
            Statement stmt = con.createStatement();

            //Dropping tables if needed
            System.out.println("Dropping student, company and apply tables if they already exist...");
            stmt.executeUpdate("DROP TABLE IF EXISTS apply;");
            stmt.executeUpdate("DROP TABLE IF EXISTS student;");
            stmt.executeUpdate("DROP TABLE IF EXISTS company;");
            System.out.println("The existing tables were dropped successfully.");

            System.out.println(divider);

            //Creating student table
            stmt.executeUpdate("CREATE TABLE student(" +
                "sid VARCHAR(12), " + 
                "sname VARCHAR(50), " + 
                "bdate DATE, " + 
                "address VARCHAR(50), " + 
                "scity VARCHAR(20), " + 
                "year VARCHAR(20), " + 
                "gpa FLOAT, " + 
                "nationality VARCHAR(20), " + 
                "PRIMARY KEY (sid)) " + 
                "ENGINE=InnoDB;");
            System.out.println("Created student table.");

            //Creating company table
            stmt.executeUpdate("CREATE TABLE company(" +
                "cid VARCHAR(8), " + 
                "cname VARCHAR(20), " + 
                "quota INT, " +
                "PRIMARY KEY (cid)) " + 
                "ENGINE=InnoDB;");
            System.out.println("Created company table.");

            //Creating apply table
            stmt.executeUpdate("CREATE TABLE apply(" +
                "sid VARCHAR(12), " + 
                "cid VARCHAR(8), " +
                "PRIMARY KEY (sid, cid), " +
                "FOREIGN KEY (sid) REFERENCES student(sid), " + 
                "FOREIGN KEY (cid) REFERENCES company(cid)) " +
                "ENGINE=InnoDB;");
            System.out.println("Created apply table.");
            
            System.out.println(divider);

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
            else
                System.out.println(e.getMessage());
        }
        

        
    }
}