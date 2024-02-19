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

import Forms.adminnform;
import Forms.agentform;
import Forms.managerform;
import Forms.revenueform;
import Forms.transactionform;
import Forms.userform;

public class menu extends JFrame implements ActionListener {
    private static final long serialVersionUID = 1L;
    private JMenuBar menuBar;
    private JMenu adminMenu;
    private JMenu agentMenu;
    private JMenu managerMenu;
    private JMenu revenueMenu;
    private JMenu transactionMenu;
    private JMenu userMenu;
    private JMenu logoutMenu;
    private JMenuItem adminItem;
    private JMenuItem agentItem;
    private JMenuItem managerItem;
    private JMenuItem revenueItem;
    private JMenuItem transactionItem;
    private JMenuItem userItem;
    private JMenuItem logoutItem;
    private String loggedInUser;

    public menu(String username) {
        this.loggedInUser = username;
        setTitle("Dashboard");
        setSize(600, 400);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLocationRelativeTo(null);

        // Create menu bar
        menuBar = new JMenuBar();

        // Create menus
        adminMenu = new JMenu("Admin");
        agentMenu = new JMenu("Agent");
        managerMenu = new JMenu("Manager");
        revenueMenu = new JMenu("Revenue");
        transactionMenu = new JMenu("Transaction");
        userMenu = new JMenu("User");
        logoutMenu = new JMenu("Logout");

        // Create menu items
        adminItem = new JMenuItem("Admin Form");
        agentItem = new JMenuItem("Agent Form");
        managerItem = new JMenuItem("Manager Form");
        revenueItem = new JMenuItem("Revenue Form");
        transactionItem = new JMenuItem("Transaction Form");
        userItem = new JMenuItem("User Form");
        logoutItem = new JMenuItem("Logout");

        // Add action listeners
        adminItem.addActionListener(this);
        agentItem.addActionListener(this);
        managerItem.addActionListener(this);
        revenueItem.addActionListener(this);
        transactionItem.addActionListener(this);
        userItem.addActionListener(this);
        logoutItem.addActionListener(this);

        // Add menu items to menus
        adminMenu.add(adminItem);
        agentMenu.add(agentItem);
        managerMenu.add(managerItem);
        revenueMenu.add(revenueItem);
        transactionMenu.add(transactionItem);
        userMenu.add(userItem);
        logoutMenu.add(logoutItem);

        // Add menus to menu bar
        menuBar.add(adminMenu);
        menuBar.add(agentMenu);
        menuBar.add(managerMenu);
        menuBar.add(revenueMenu);
        menuBar.add(transactionMenu);
        menuBar.add(userMenu);
        menuBar.add(logoutMenu);

        // Set menu bar to frame
        setJMenuBar(menuBar);

        // Initialize dashboard panel
        JPanel dashboardPanel = new JPanel();
        dashboardPanel.setLayout(new BorderLayout());

        // Add components to dashboard panel
        JLabel titleLabel = new JLabel("WELCOME " + loggedInUser + " DASHBOARD");
        titleLabel.setHorizontalAlignment(SwingConstants.CENTER);
        titleLabel.setFont(new Font("Arial", Font.BOLD, 24));
        dashboardPanel.add(titleLabel, BorderLayout.CENTER);

        // Add dashboard panel to frame
        add(dashboardPanel);

        setVisible(true);
    }

    @Override
    public void actionPerformed(ActionEvent e) {
        if (e.getSource() == adminItem) {
            new adminnform();
        } else if (e.getSource() == agentItem) {
            new agentform();
        } else if (e.getSource() == managerItem) {
            new managerform();
        } else if (e.getSource() == revenueItem) {
            new revenueform();
        } else if (e.getSource() == transactionItem) {
            new transactionform();
        } else if (e.getSource() == userItem) {
            new userform();
        } else if (e.getSource() == logoutItem) {
            int choice = JOptionPane.showConfirmDialog(this, "Do you want to logout?", "Logout",
                    JOptionPane.YES_NO_OPTION);
            if (choice == JOptionPane.YES_OPTION) {
                dispose();
            }
        }
    }

    public static void main(String[] args) {
        SwingUtilities.invokeLater(() -> new menu("TO GOVERNMENT_REVENUE_MANAGEMENT_SYSTEM"));
    }
}
