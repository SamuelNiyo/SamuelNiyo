package menu;

import java.awt.BorderLayout;
import java.awt.Font;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JMenu;
import javax.swing.JMenuBar;
import javax.swing.JMenuItem;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.SwingConstants;
import javax.swing.SwingUtilities;

import Forms.revenueform;
import Forms.transactionform;
import Forms.userform;
import adminlogin.admin_login;

public class user_menu extends JFrame implements ActionListener {

    private static final long serialVersionUID = 1L;
    private JMenuBar menuBar;
    private JMenu revenueMenu;
    private JMenu transactionMenu;
    private JMenu userMenu;
    private JMenuItem revenueItem;
    private JMenuItem transactionItem;
    private JMenuItem userItem;
    private String loggedInUser;

    public user_menu(String username) {
        this.loggedInUser = username;
        setTitle("Dashboard");
        setSize(600, 400);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLocationRelativeTo(null);

        menuBar = new JMenuBar();

        revenueMenu = new JMenu("Revenue");
        transactionMenu = new JMenu("Transaction");
        userMenu = new JMenu("User");

        revenueItem = new JMenuItem("Revenue Form");
        transactionItem = new JMenuItem("Transaction Form");
        userItem = new JMenuItem("User Form");

        revenueItem.addActionListener(this);
        transactionItem.addActionListener(this);
        userItem.addActionListener(this);

        revenueMenu.add(revenueItem);
        transactionMenu.add(transactionItem);
        userMenu.add(userItem);

        menuBar.add(revenueMenu);
        menuBar.add(transactionMenu);
        menuBar.add(userMenu);

        setJMenuBar(menuBar);

        JPanel dashboardPanel = new JPanel();
        dashboardPanel.setLayout(new BorderLayout());

        JLabel titleLabel = new JLabel("WELCOME " + loggedInUser + " DASHBOARD");
        titleLabel.setHorizontalAlignment(SwingConstants.CENTER);
        titleLabel.setFont(new Font("Arial", Font.BOLD, 24));
        dashboardPanel.add(titleLabel, BorderLayout.CENTER);

        add(dashboardPanel);

        setVisible(true);
    }

    @Override
    public void actionPerformed(ActionEvent e) {
        if (e.getSource() == revenueItem) {
            new revenueform();
        } else if (e.getSource() == transactionItem) {
            new transactionform();
        } else if (e.getSource() == userItem) {
            new userform();
        }
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> new user_menu("TO GOVERNMENT_REVENUE_MANAGEMENT_SYSTEM"));
    }
}
