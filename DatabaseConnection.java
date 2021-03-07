import java.sql.*;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DatabaseConnection
{
    public static void main(String [] args)
    {
        try
        {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection con = DriverManager.getConnection("jdbc:mysql://dijkstra.ug.bcc.bilkent.edu.tr:3306/bora_cun", "bora.cun", "DPZ3a7Km");

            Statement stmt = con.createStatement();
            ResultSet rs = stmt.executeQuery("select * from emp");

            while(rs.next())
                System.out.println(rs.getInt(1) + " " + rs.getString(2) + " " + rs.getString(3));
            con.close();
        }
        catch(Exception e)
        {
            System.out.println(e);
        }
    }
}