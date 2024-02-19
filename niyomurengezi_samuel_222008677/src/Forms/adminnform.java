package Forms;

import java.awt.Color;
import java.awt.Dimension;
import java.awt.Font;
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JTextField;
import javax.swing.JOptionPane;

public class adminnform implements ActionListener {
    JFrame frame;
    JLabel id_lb = new JLabel("ID");
    JLabel fname_lb = new JLabel("First name");
    JLabel lname_lb = new JLabel("Last Name");
    JLabel email_lb = new JLabel("Email");
    JLabel telephone_lb = new JLabel("Telephone");
   // JLabel gender_lb = new JLabel("Gender");

    JTextField id_txf = new JTextField();
    JTextField first_name_txf = new JTextField();
    JTextField last_name_txf = new JTextField();
    JTextField email_txf = new JTextField();
    JTextField telephone_txf = new JTextField();

  //  String[] gender = {"Male", "Female"};
  //  JComboBox<String> genderBox = new JComboBox<>(gender);

    JButton insert_btn = new JButton("Insert");
    JButton read_btn = new JButton("Read");
    JButton update_btn = new JButton("Update");
    JButton delete_btn = new JButton("Delete");

    Dimension screensize = Toolkit.getDefaultToolkit().getScreenSize();

    public adminnform() {
        createForm();
    }

    private void createForm() {
        frame = new JFrame();
        frame.setTitle("ADMIN FORM");
        frame.setBounds(350, 100, 400, 350);
        frame.getContentPane().setLayout(null);
        frame.getContentPane().setBackground(Color.LIGHT_GRAY);
        frame.setVisible(true);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setResizable(true);
        setLocationAndSize();
    }

    private void setLocationAndSize() {
        id_lb.setBounds(10, 10, 100, 30);
        fname_lb.setBounds(10, 50, 100, 30);
        lname_lb.setBounds(10, 90, 100, 30);
        email_lb.setBounds(10, 130, 100, 30);
        telephone_lb.setBounds(10, 170, 100, 30);
       // gender_lb.setBounds(10, 210, 100, 30);

        id_txf.setBounds(160, 10, 130, 30);
        first_name_txf.setBounds(160, 50, 130, 30);
        last_name_txf.setBounds(160, 90, 130, 30);
        email_txf.setBounds(160, 130, 130, 30);
        telephone_txf.setBounds(160, 170, 130, 30);
       // genderBox.setBounds(160, 210, 130, 30);

        insert_btn.setBounds(10, 250, 85, 30);
        read_btn.setBounds(100, 250, 85, 30);
        update_btn.setBounds(190, 250, 85, 30);
        delete_btn.setBounds(280, 250, 85, 30);
        setFontForAll();
        addComponentsForFrame();
    }

    private void setFontForAll() {
        Font font = new Font("Georgia", Font.BOLD, 18);

        id_lb.setFont(font);
        fname_lb.setFont(font);
        lname_lb.setFont(font);
        email_lb.setFont(font);
        telephone_lb.setFont(font);
      //  gender_lb.setFont(font);

        id_txf.setFont(font);
        first_name_txf.setFont(font);
        last_name_txf.setFont(font);
        email_txf.setFont(font);
        telephone_txf.setFont(font);
       // genderBox.setFont(font);

        Font fonti = new Font("Georgia", Font.ITALIC, 12);

        insert_btn.setFont(fonti);
        read_btn.setFont(fonti);
        update_btn.setFont(fonti);
        delete_btn.setFont(fonti);
    }

    private void addComponentsForFrame() {
        frame.add(id_lb);
        frame.add(fname_lb);
        frame.add(lname_lb);
        frame.add(email_lb);
        frame.add(telephone_lb);
      //  frame.add(gender_lb);

        frame.add(id_txf);
        frame.add(first_name_txf);
        frame.add(last_name_txf);
        frame.add(email_txf);
        frame.add(telephone_txf);
      //  frame.add(genderBox);

        frame.add(insert_btn);
        frame.add(read_btn);
        frame.add(update_btn);
        frame.add(delete_btn);

        insert_btn.addActionListener(this);
insert_btn.addActionListener(new ActionListener() {
			
			public void actionPerformed(java.awt.event.ActionEvent e) {
				try {
					Class.forName("com.mysql.cj.jdbc.Driver");	
					Connection connection=DriverManager
							.getConnection("jdbc:mysql://localhost:3306/revenuesystem","root","");
					String query="INSERT INTO adminn VALUES(?,?,?,?,?)";
					PreparedStatement pStatement=connection.prepareStatement(query);
					pStatement.setInt(1,Integer.parseInt(id_txf.getText()));
					pStatement.setString(2, first_name_txf.getText());
					pStatement.setString(3, last_name_txf.getText());
					pStatement.setString(4, email_txf.getText());
					pStatement.setString(5, telephone_txf.getText());
				//	pStatement.setString(6, genderBox.getToolkit());
					pStatement.executeUpdate();
					JOptionPane.showMessageDialog(insert_btn, "data inserted well");
					pStatement.close();
					connection.close();	
				} catch (Exception e2) {
					System.out.println(e2.getMessage());
				}
				
			}
		});	
		
        read_btn.addActionListener(this);
        update_btn.addActionListener(this);
        update_btn.addActionListener(new ActionListener() {

        	public void actionPerformed(java.awt.event.ActionEvent e) {
        			try {
        				Class.forName("com.mysql.cj.jdbc.Driver");	
        				Connection connection=DriverManager.getConnection("jdbc:mysql://localhost:3306/revenuesystem","root","");
        				String sql="UPDATE adminn SET  first_name=?,last_name=?,email=?, telephone=?  WHERE id=?";
        				PreparedStatement stm=connection.prepareStatement(sql);
        			
        				stm.setString(1, first_name_txf.getText());
        				stm.setString(2, last_name_txf.getText());
        				stm.setString(3, email_txf.getText());
        				stm.setString(4, telephone_txf.getText());
        				stm.setInt(5,Integer.parseInt(id_txf.getText()));
        				
        				
        				stm.executeUpdate();
        				
        				JOptionPane.showMessageDialog(update_btn, "update data!");
        				stm.close();
        				connection.close();	
        			} catch (Exception e2) {
        				System.out.println(e2.getMessage());
        			}
        			
        		}
        				});
        delete_btn.addActionListener(this);
        delete_btn.addActionListener(new ActionListener() {
        	
        	
        	public void actionPerformed(java.awt.event.ActionEvent e) {
        		try {
        			Class.forName("com.mysql.cj.jdbc.Driver");	
        			Connection connection=DriverManager.getConnection("jdbc:mysql://localhost:3306/revenuesystem","root","");
        			String sql="DELETE FROM adminn  WHERE id=?";
        			int brtxf=Integer.parseInt(JOptionPane.showInputDialog("Enter id to delete:"));
        			
        			
        			PreparedStatement stm=connection.prepareStatement(sql);
        			
        			
        			
        			
        			stm.setInt(1,brtxf);
        			
        			JOptionPane.showMessageDialog(delete_btn, "recorded out!!!!!!!!!");
        			//Component delete;
        			stm.executeUpdate();
        			stm.close();
        			
        			connection.close();	
        		} catch (Exception e2) {
        			System.out.println(e2.getMessage());
        		}
        		
        	}
        });
        
    }

    @Override
    public void actionPerformed(ActionEvent e) {
    	
        }
    

    public static void main(String[] args) {
        new adminnform();
    }
}
