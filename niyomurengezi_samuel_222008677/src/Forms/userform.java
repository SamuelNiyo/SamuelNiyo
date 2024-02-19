package Forms;


import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;

public class userform implements ActionListener {
    JFrame frame;
    JLabel id_lb = new JLabel("ID");
    JLabel fname_lb = new JLabel("First name");
    JLabel lname_lb = new JLabel("Last Name");
    JLabel tin_number_lb = new JLabel("Tin Number");
    JLabel age_lb = new JLabel("Age");
    JLabel address_lb = new JLabel("Address");
    JLabel email_lb = new JLabel("Email");
    JLabel registration_date_lb = new JLabel("Registration Date");
    JLabel agent_id_lb = new JLabel("Agent Id");

    JTextField id_txf = new JTextField();
    JTextField first_name_txf = new JTextField();
    JTextField last_name_txf = new JTextField();
    JTextField tin_number_txf = new JTextField();
    JTextField age_txf = new JTextField();
    JTextField address_txf = new JTextField();
    JTextField email_txf = new JTextField();
    JTextField registration_date_txf = new JTextField();
    JTextField agent_id_texField =new JTextField();
    

    JButton insert_btn = new JButton("Insert");
    JButton read_btn = new JButton("Read");
    JButton update_btn = new JButton("Update");
    JButton delete_btn = new JButton("Delete");
    
    

    Dimension screensize = Toolkit.getDefaultToolkit().getScreenSize();
    int w = (int) screensize.getWidth();
    int h = (int) screensize.getHeight();

    public userform() {
        createForm();
    }

    
    
    
    private void createForm() {
        frame = new JFrame();
        frame.setTitle("USER FORM");
        frame.setBounds(350, 100, 600, 425);
        frame.getContentPane().setLayout(null);
        frame.getContentPane().setBackground(Color.LIGHT_GRAY);
        frame.setVisible(true);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setResizable(true);
        setLocationAndSize();
    }

    
    
    
    private void setLocationAndSize() {
        id_lb.setBounds(10, 10, 160, 30);
        fname_lb.setBounds(10, 50, 160, 30);
        lname_lb.setBounds(10, 90, 160, 30);
        tin_number_lb.setBounds(10, 130, 160, 30);
        age_lb.setBounds(10, 170, 160, 30);
        address_lb.setBounds(10, 210, 160, 30);
        email_lb.setBounds(10, 250, 160, 30);
        registration_date_lb.setBounds(10, 290, 160, 30);
        agent_id_lb.setBounds(10, 330, 160, 30);
        
        
        

        id_txf.setBounds(200, 10, 180, 30);
        first_name_txf.setBounds(200, 50, 180, 30);
        last_name_txf.setBounds(200, 90, 180, 30);
        tin_number_txf.setBounds(200, 130, 180, 30);
        age_txf.setBounds(200, 170, 180, 30);
        address_txf.setBounds(200, 210, 180, 30);
        email_txf.setBounds(200, 250, 180, 30);
        registration_date_txf.setBounds(200, 290, 180, 30);
        agent_id_texField.setBounds(200, 330, 180, 30);

        
        
        
        insert_btn.setBounds(10, 350, 85, 30);
        read_btn.setBounds(100, 350, 85, 30);
        update_btn.setBounds(190, 350, 85, 30);
        delete_btn.setBounds(280, 350, 85, 30);

        setFontForAll();
        addComponentsForFrame();
    }
    
    
    

    private void setFontForAll() {
        Font font = new Font("Georgia", Font.BOLD, 17);
        Font fonti = new Font("Georgia", Font.ITALIC, 12);

        id_lb.setFont(font);
        fname_lb.setFont(font);
        lname_lb.setFont(font);
        tin_number_lb.setFont(font);
        age_lb.setFont(font);
        address_lb.setFont(font);
        email_lb.setFont(font);
        registration_date_lb.setFont(font);
        
        

        id_txf.setFont(font);
        first_name_txf.setFont(font);
        last_name_txf.setFont(font);
        tin_number_txf.setFont(font);
        age_txf.setFont(font);
        address_txf.setFont(font);
        email_txf.setFont(font);
        registration_date_txf.setFont(font);
        agent_id_texField.setFont(font);
        
        

        insert_btn.setFont(fonti);
        read_btn.setFont(fonti);
        update_btn.setFont(fonti);
        delete_btn.setFont(fonti);
    }

    private void addComponentsForFrame() {
        frame.add(id_lb);
        frame.add(fname_lb);
        frame.add(lname_lb);
        frame.add(tin_number_lb);
        frame.add(age_lb);
        frame.add(address_lb);
        frame.add(email_lb);
        frame.add(registration_date_lb);
        frame.add(agent_id_lb);
        

        frame.add(id_txf);
        frame.add(first_name_txf);
        frame.add(last_name_txf);
        frame.add(tin_number_txf);
        frame.add(age_txf);
        frame.add(address_txf);
        frame.add(email_txf);
        frame.add(registration_date_txf);
        frame.add(agent_id_texField);
        
        

        frame.add(insert_btn);
        frame.add(read_btn);
        frame.add(update_btn);
        frame.add(delete_btn);

        
        
        
        insert_btn.addActionListener(this);
insert_btn.addActionListener(new ActionListener() {
			
			public void actionPerformed(java.awt.event.ActionEvent e) {
				try {
					Class.forName("com.mysql.cj.jdbc.Driver");	
					Connection connection=DriverManager.getConnection("jdbc:mysql://localhost:3306/revenuesystem","root","");
					String query=("INSERT INTO user values(?,?,?,?,?,?,?,?,?)");
					PreparedStatement pStatement=connection.prepareStatement(query);
					pStatement.setInt(1,Integer.parseInt(id_txf.getText()));
					pStatement.setString(2, first_name_txf.getText());
					pStatement.setString(3, last_name_txf.getText());
					pStatement.setString(4, tin_number_txf.getText());
					pStatement.setString(5, age_txf.getText());
					pStatement.setString(6, address_txf.getText());
					pStatement.setString(7, email_txf.getText());
					pStatement.setString(8, registration_date_txf.getText());
					pStatement.setString(9, agent_id_texField.getText());
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
        				String sql="UPDATE user SET  first_name=?,last_name=?,tin_number=?, age=?, address=?, email=?, registration_date=?, agent_id=?  WHERE id=?";
        				PreparedStatement stm=connection.prepareStatement(sql);
        			
        				stm.setString(1, first_name_txf.getText());
        				stm.setString(2, last_name_txf.getText());
        				stm.setString(3, tin_number_txf.getText());
        				stm.setString(4, age_txf.getText());
        				stm.setString(5, address_txf.getText());
        				stm.setString(6, email_txf.getText());
        				stm.setString(7, registration_date_txf.getText());
        				stm.setString(8, agent_id_texField.getText());
        				stm.setInt(9,Integer.parseInt(id_txf.getText()));
        				
        				
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
        			String sql="DELETE FROM user  WHERE id=?";
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
        new userform();
    }
}
