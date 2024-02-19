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

public class revenueform implements ActionListener {
    JFrame frame;
    JLabel id_lb = new JLabel("ID");
    JLabel amount_lb = new JLabel("Amount");
    JLabel revenue_type_lb = new JLabel("Revenue Type");

    JTextField id_txf = new JTextField();
    JTextField amount_txf = new JTextField();
    JTextField revenue_type = new JTextField();


    JButton insert_btn = new JButton("Insert");
    JButton read_btn = new JButton("Read");
    JButton update_btn = new JButton("Update");
    JButton delete_btn = new JButton("Delete");

    Dimension screensize = Toolkit.getDefaultToolkit().getScreenSize();

    public revenueform() {
        createForm();
    }

    private void createForm() {
        frame = new JFrame();
        frame.setTitle("REVENUE FORM");
        frame.setBounds(410, 100, 400, 230);
        frame.getContentPane().setLayout(null);
        frame.getContentPane().setBackground(Color.LIGHT_GRAY);
        frame.setVisible(true);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setResizable(true);
        setLocationAndSize();
    }

    private void setLocationAndSize() {
        id_lb.setBounds(10, 10, 100, 30);
        amount_lb.setBounds(10, 50, 100, 30);
        revenue_type_lb.setBounds(10, 90, 150, 30);

        id_txf.setBounds(160, 10, 170, 30);
        amount_txf.setBounds(160, 50, 170, 30);
        revenue_type.setBounds(160, 90, 170, 30);

        insert_btn.setBounds(10, 150, 85, 30);
        read_btn.setBounds(100, 150, 85, 30);
        update_btn.setBounds(190, 150, 85, 30);
        delete_btn.setBounds(280, 150, 85, 30);
        setFontForAll();
        addComponentsForFrame();
    }

    private void setFontForAll() {
        Font font = new Font("Georgia", Font.BOLD, 18);

        id_lb.setFont(font);
        amount_lb.setFont(font);
        revenue_type_lb.setFont(font);

        id_txf.setFont(font);
        amount_txf.setFont(font);
        revenue_type.setFont(font);

        Font fonti = new Font("Georgia", Font.ITALIC, 12);

        insert_btn.setFont(fonti);
        read_btn.setFont(fonti);
        update_btn.setFont(fonti);
        delete_btn.setFont(fonti);
    }

    private void addComponentsForFrame() {
        frame.add(id_lb);
        frame.add(amount_lb);
        frame.add(revenue_type_lb);

        frame.add(id_txf);
        frame.add(amount_txf);
        frame.add(revenue_type);

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
					String query="INSERT INTO revenue VALUES(?,?,?)";
					PreparedStatement pStatement=connection.prepareStatement(query);
					pStatement.setInt(1,Integer.parseInt(id_txf.getText()));
					pStatement.setString(2, amount_txf.getText());
					pStatement.setString(3, revenue_type.getText());
					
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
        				String sql="UPDATE revenue SET  amount=?, revenue_type=?  WHERE id=?";
        				PreparedStatement stm=connection.prepareStatement(sql);
        			
        				stm.setString(1, amount_txf.getText());
        				stm.setString(2, revenue_type.getText());
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
        			String sql="DELETE FROM revenue  WHERE id=?";
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
        new revenueform();
    }

    @ Override
    public void actionPerformed(ActionEvent e) {
       
        }
    }

