package Forms;

import java.awt.Color;
import java.awt.Font;
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

public class agentform implements ActionListener {
    private JFrame frame;
    private JLabel id_Label = new JLabel("ID");
    private JLabel first_name_Label = new JLabel("First Name");
    private JLabel last_nameLabel = new JLabel("Last Name");
    private JLabel email_Label = new JLabel("Email");
    private JLabel telephone_Label = new JLabel("Telephone");
    private JLabel adminid_Label = new JLabel("Admin Id");
    private JLabel managerid_Label = new JLabel("Manager Id");

    private JTextField id_TextField = new JTextField();
    private JTextField first_nameTextField = new JTextField();
    private JTextField last_nameTextField = new JTextField();
    private JTextField email_TextField = new JTextField();
    private JTextField telephone_TextField = new JTextField();
    private JTextField adminid_TextField = new JTextField();
    private JTextField managerid_TextField = new JTextField();

    private JButton insertButton = new JButton("Insert");
    private JButton readButton = new JButton("Read");
    private JButton updateButton = new JButton("Update");
    private JButton deleteButton = new JButton("Delete");

    public agentform() {
        createForm();
        setLocationAndSize();
        setFonts();
        addComponents();
        addActionListeners();
    }
    

    private void createForm() {
        frame = new JFrame();
        frame.setTitle("AGENT FORM");
        frame.setBounds(350, 100, 450, 380);
        frame.getContentPane().setLayout(null);
        frame.getContentPane().setBackground(Color.LIGHT_GRAY);
        frame.setVisible(true);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setResizable(true);
    }

    private void setLocationAndSize() {
    	id_Label.setBounds(10, 10, 130, 30);
        first_name_Label.setBounds(10, 50, 130, 30);
        last_nameLabel.setBounds(10, 90, 130, 30);
        email_Label.setBounds(10, 130, 130, 30);
        telephone_Label.setBounds(10, 170, 130, 30);
        adminid_Label.setBounds(10, 210, 130, 30);
        managerid_Label.setBounds(10, 250, 130, 30);

        id_TextField.setBounds(200, 10, 190, 30);
        first_nameTextField.setBounds(200, 50, 190, 30);
        last_nameTextField.setBounds(200, 90, 190, 30);
        email_TextField.setBounds(200, 130, 190, 30);
        telephone_TextField.setBounds(200, 170, 190, 30);
        adminid_TextField.setBounds(200, 210, 190, 30);
        managerid_TextField.setBounds(200, 250, 190, 30);

        insertButton.setBounds(10, 300, 85, 30);
        readButton.setBounds(100, 300, 85, 30);
        updateButton.setBounds(190, 300, 85, 30);
        deleteButton.setBounds(280, 300, 85, 30);
    }

    private void setFonts() {
        Font font = new Font("Georgia", Font.BOLD, 18);
        Font italicFont = new Font("Georgia", Font.ITALIC, 12);

        id_Label.setFont(font);
        first_name_Label.setFont(font);
        last_nameLabel.setFont(font);
        email_Label.setFont(font);
        telephone_Label.setFont(font);
        adminid_Label.setFont(font);
        managerid_Label.setFont(font);

        id_TextField.setFont(font);
        first_nameTextField.setFont(font);
        last_nameTextField.setFont(font);
        email_TextField.setFont(font);
        telephone_TextField.setFont(font);
        adminid_TextField.setFont(font);
        managerid_TextField.setFont(font);

        insertButton.setFont(italicFont);
        readButton.setFont(italicFont);
        updateButton.setFont(italicFont);
        deleteButton.setFont(italicFont);
    }

    private void addComponents() {
        frame.add(id_Label);
        frame.add(first_name_Label);
        frame.add(last_nameLabel);
        frame.add(email_Label);
        frame.add(telephone_Label);
        frame.add(adminid_Label);
        frame.add(managerid_Label);

        frame.add(id_TextField);
        frame.add(first_nameTextField);
        frame.add(last_nameTextField);
        frame.add(email_TextField);
        frame.add(telephone_TextField);
        frame.add(adminid_TextField);
        frame.add(managerid_TextField);

        frame.add(insertButton);
        frame.add(readButton);
        frame.add(updateButton);
        frame.add(deleteButton);
    }

    private void addActionListeners() {
        insertButton.addActionListener(this);
insertButton.addActionListener(new ActionListener() {
			
			public void actionPerformed(java.awt.event.ActionEvent e) {
				try {
					Class.forName("com.mysql.cj.jdbc.Driver");	
					Connection connection=DriverManager
							.getConnection("jdbc:mysql://localhost:3306/revenuesystem","root","");
					String query="INSERT INTO agent VALUES(?,?,?,?,?,?,?)";
					PreparedStatement pStatement=connection.prepareStatement(query);
					pStatement.setInt(1,Integer.parseInt(id_TextField.getText()));
					pStatement.setString(2, first_nameTextField.getText());
					pStatement.setString(3, last_nameTextField.getText());
					pStatement.setString(4, email_TextField.getText());
					pStatement.setString(5, telephone_TextField.getText());
					pStatement.setString(6, adminid_TextField.getText());
					pStatement.setString(7, managerid_TextField.getText());
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
        				String sql="UPDATE agent SET  first_name=?,last_name=?,email=?, telephone=?, adminid=?, managerid=?  WHERE id=?";
        				PreparedStatement stm=connection.prepareStatement(sql);
        			
        				stm.setString(1, first_nameTextField.getText());
        				stm.setString(2, last_nameTextField.getText());
        				stm.setString(3, email_TextField.getText());
        				stm.setString(4, telephone_TextField.getText());
        				stm.setString(5, adminid_TextField.getText());
        				stm.setString(6, managerid_TextField.getText());
        				stm.setInt(7,Integer.parseInt(id_TextField.getText()));
        				
        				
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
        			String sql="DELETE FROM agent  WHERE id=?";
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

    @Override
    public void actionPerformed(ActionEvent e) {
     
    }

    public static void main(String[] args) {
        new agentform();
    }
}
    

