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
import javax.swing.JOptionPane;
import javax.swing.JTextField;

public class managerform implements ActionListener {
    JFrame frame;
    JLabel id_label = new JLabel("ID");
    JLabel first_name_label = new JLabel("First name");
    JLabel last_name_label = new JLabel("Last Name");
    JLabel address_label = new JLabel("Address");
    JLabel specialization_label = new JLabel("Specialization");

    JTextField id_TextField = new JTextField();
    JTextField first_name_TextField = new JTextField();
    JTextField last_name_TextField = new JTextField();
    JTextField address_TextField = new JTextField();
    JTextField specialization_TextField = new JTextField();

    JButton insertButton = new JButton("Insert");
    JButton readButton = new JButton("Read");
    JButton updateButton = new JButton("Update");
    JButton deleteButton = new JButton("Delete");

    Dimension screenSize = Toolkit.getDefaultToolkit().getScreenSize();

    public managerform() {
        createForm();
    }

    private void createForm() {
        frame = new JFrame();
        frame.setTitle("MANAGER FORM");
        frame.setBounds(300, 120, 500, 325);
        frame.getContentPane().setLayout(null);
        frame.getContentPane().setBackground(Color.LIGHT_GRAY);
        frame.setVisible(true);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setResizable(true);
        setLocationAndSize();
    }

    private void setLocationAndSize() {
        id_label.setBounds(10, 10, 150, 30);
        first_name_label.setBounds(10, 50, 150, 30);
        last_name_label.setBounds(10, 90, 150, 30);
        address_label.setBounds(10, 130, 150, 30);
        specialization_label.setBounds(10, 170, 150, 30);

        id_TextField.setBounds(230, 10, 200, 30);
        first_name_TextField.setBounds(230, 50, 200, 30);
        last_name_TextField.setBounds(230, 90, 200, 30);
        address_TextField.setBounds(230, 130, 200, 30);
        specialization_TextField.setBounds(230, 170, 200, 30);

        insertButton.setBounds(10, 250, 85, 30);
        readButton.setBounds(100, 250, 85, 30);
        updateButton.setBounds(190, 250, 85, 30);
        deleteButton.setBounds(280, 250, 85, 30);
        setFontForAll();
        addComponentsForFrame();
    }

    private void setFontForAll() {
        Font font = new Font("Georgia", Font.BOLD, 18);

        id_label.setFont(font);
        first_name_label.setFont(font);
        last_name_label.setFont(font);
        address_label.setFont(font);
        specialization_label.setFont(font);

        id_TextField.setFont(font);
        first_name_TextField.setFont(font);
        last_name_TextField.setFont(font);
        address_TextField.setFont(font);
        specialization_TextField.setFont(font);

        Font italicFont = new Font("Georgia", Font.ITALIC, 12);

        insertButton.setFont(italicFont);
        readButton.setFont(italicFont);
        updateButton.setFont(italicFont);
        deleteButton.setFont(italicFont);
    }

    private void addComponentsForFrame() {
        frame.add(id_label);
        frame.add(first_name_label);
        frame.add(last_name_label);
        frame.add(address_label);
        frame.add(specialization_label);

        frame.add(id_TextField);
        frame.add(first_name_TextField);
        frame.add(last_name_TextField);
        frame.add(address_TextField);
        frame.add(specialization_TextField);

        frame.add(insertButton);
        frame.add(readButton);
        frame.add(updateButton);
        frame.add(deleteButton);

        insertButton.addActionListener(this);
insertButton.addActionListener(new ActionListener() {
			
			public void actionPerformed(java.awt.event.ActionEvent e) {
				try {
					Class.forName("com.mysql.cj.jdbc.Driver");	
					Connection connection=DriverManager
							.getConnection("jdbc:mysql://localhost:3306/revenuesystem","root","");
					String query="INSERT INTO manager VALUES(?,?,?,?,?)";
					PreparedStatement pStatement=connection.prepareStatement(query);
					pStatement.setInt(1,Integer.parseInt(id_TextField.getText()));
					pStatement.setString(2, first_name_TextField.getText());
					pStatement.setString(3, last_name_TextField.getText());
					pStatement.setString(4, address_TextField.getText());
					pStatement.setString(5, specialization_TextField.getText());
					pStatement.executeUpdate();
					JOptionPane.showMessageDialog(insertButton, "data inserted well");
					pStatement.close();
					connection.close();	
				} catch (Exception e2) {
					System.out.println(e2.getMessage());
				}
				
			}
		});	
         readButton.addActionListener(this);
         updateButton.addActionListener(this);
         updateButton.addActionListener(new ActionListener() {

         	public void actionPerformed(java.awt.event.ActionEvent e) {
         			try {
         				Class.forName("com.mysql.cj.jdbc.Driver");	
         				Connection connection=DriverManager.getConnection("jdbc:mysql://localhost:3306/revenuesystem","root","");
         				String sql="UPDATE manager SET  first_name=?,last_name=?,address=?, specialization=?  WHERE id=?";
         				PreparedStatement stm=connection.prepareStatement(sql);
         			
         				stm.setString(1, first_name_TextField.getText());
         				stm.setString(2, last_name_TextField.getText());
         				stm.setString(3, address_TextField.getText());
         				stm.setString(4, specialization_TextField.getText());
         				stm.setInt(5,Integer.parseInt(id_TextField.getText()));
         				
         				
         				stm.executeUpdate();
         				
         				JOptionPane.showMessageDialog(updateButton, "update data!");
         				stm.close();
         				connection.close();	
         			} catch (Exception e2) {
         				System.out.println(e2.getMessage());
         			}
         			
         		}
         				});
        deleteButton.addActionListener(this);
deleteButton.addActionListener(new ActionListener() {
        	
        	
        	public void actionPerformed(java.awt.event.ActionEvent e) {
        		try {
        			Class.forName("com.mysql.cj.jdbc.Driver");	
        			Connection connection=DriverManager.getConnection("jdbc:mysql://localhost:3306/revenuesystem","root","");
        			String sql="DELETE FROM manager  WHERE id=?";
        			int brtxf=Integer.parseInt(JOptionPane.showInputDialog("Enter id to delete:"));
        			
        			
        			PreparedStatement stm=connection.prepareStatement(sql);
        			
        			
        			
        			
        			stm.setInt(1,brtxf);
        			
        			JOptionPane.showMessageDialog(deleteButton, "recorded out!!!!!!!!!");
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

    public static void main(String[] args) {
        new managerform();
    }

    @Override
    public void actionPerformed(ActionEvent e) {
       
    }
}
