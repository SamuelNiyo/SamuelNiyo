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

public class transactionform implements ActionListener {
    JFrame frame;
    JLabel id_lb = new JLabel("ID");
    JLabel userid_lb = new JLabel("User Id");
    JLabel revenueid_lb = new JLabel("Revenue Id");

    JTextField id_txf = new JTextField();
    JTextField userid_txf = new JTextField();
    JTextField revenueid_txf = new JTextField();

    JButton insert_btn = new JButton("Insert");
    JButton read_btn = new JButton("Read");
    JButton update_btn = new JButton("Update");
    JButton delete_btn = new JButton("Delete");

    Dimension screenSize = Toolkit.getDefaultToolkit().getScreenSize();

    public transactionform() {
        createForm();
    }

    private void createForm() {
        frame = new JFrame();
        frame.setTitle("TRANSACTION FORM");
        frame.setBounds(380, 100, 450, 210);
        frame.getContentPane().setLayout(null);
        frame.getContentPane().setBackground(Color.LIGHT_GRAY);
        frame.setVisible(true);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setResizable(true);
        setLocationAndSize();
    }

    private void setLocationAndSize() {
        id_lb.setBounds(10, 10, 100, 30);
        userid_lb.setBounds(10, 50, 100, 30);
        revenueid_lb.setBounds(10, 90, 150, 30);

        id_txf.setBounds(200, 10, 160, 30);
        userid_txf.setBounds(200, 50, 160, 30);
        revenueid_txf.setBounds(200, 90, 160, 30);

        insert_btn.setBounds(10, 130, 85, 30);
        read_btn.setBounds(100, 130, 85, 30);
        update_btn.setBounds(190, 130, 85, 30);
        delete_btn.setBounds(280, 130, 85, 30);
        setFontForAll();
        addComponentsForFrame();
    }

    private void setFontForAll() {
        Font font = new Font("Georgia", Font.BOLD, 18);

        id_lb.setFont(font);
        userid_lb.setFont(font);
        revenueid_lb.setFont(font);

        id_txf.setFont(font);
        userid_txf.setFont(font);
        revenueid_txf.setFont(font);

        Font fonti = new Font("Georgia", Font.ITALIC, 12);

        insert_btn.setFont(fonti);
        read_btn.setFont(fonti);
        update_btn.setFont(fonti);
        delete_btn.setFont(fonti);
    }

    private void addComponentsForFrame() {
        frame.add(id_lb);
        frame.add(userid_lb);
        frame.add(revenueid_lb);

        frame.add(id_txf);
        frame.add(userid_txf);
        frame.add(revenueid_txf);

        frame.add(insert_btn);
        frame.add(read_btn);
        frame.add(update_btn);
        frame.add(delete_btn);

        // Add action listeners to buttons
        insert_btn.addActionListener(this);
insert_btn.addActionListener(new ActionListener() {
			
			public void actionPerformed(java.awt.event.ActionEvent e) {
				try {
					Class.forName("com.mysql.cj.jdbc.Driver");	
					Connection connection=DriverManager
							.getConnection("jdbc:mysql://localhost:3306/revenuesystem","root","");
					String query="INSERT INTO transaction VALUES(?,?,?)";
					PreparedStatement pStatement=connection.prepareStatement(query);
					pStatement.setInt(1,Integer.parseInt(id_txf.getText()));
					pStatement.setString(2, userid_txf.getText());
					pStatement.setString(3, revenueid_txf.getText());
					
					pStatement.executeUpdate();
					JOptionPane.showMessageDialog(insert_btn, "data inserted well");
					pStatement.close();
					connection.close();	
				} catch (Exception e2) {
					System.out.println(e2.getMessage());
				}
				
			}
		});	
insert_btn.addActionListener(new ActionListener() {
			
			public void actionPerformed(java.awt.event.ActionEvent e) {
				try {
					Class.forName("com.mysql.cj.jdbc.Driver");	
					Connection connection=DriverManager.getConnection("jdbc:mysql://localhost:3306/revenuesystem","root","");
					String query=("INSERT INTO transaction (id,userid,revenueid)values(?,?,?)");
					PreparedStatement pStatement=connection.prepareStatement(query);
					pStatement.setInt(1,Integer.parseInt(id_txf.getText()));
					pStatement.setString(2, userid_txf.getText());
					pStatement.setString(3, revenueid_txf.getText());
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
        				String sql="UPDATE transaction SET  userid=?, revenueid=?  WHERE id=?";
        				PreparedStatement stm=connection.prepareStatement(sql);
        			
        				stm.setString(1, userid_txf.getText());
        				stm.setString(2, revenueid_txf.getText());
        				stm.setInt(3,Integer.parseInt(id_txf.getText()));
        				
        				
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
        			String sql="DELETE FROM transaction  WHERE id=?";
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

    public static void main(String[] args) {
        new transactionform();
    }

    @Override
    public void actionPerformed(ActionEvent e) {
      
        }
    }
