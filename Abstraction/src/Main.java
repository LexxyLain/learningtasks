import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class Main {

    public static void main(String[] args) {
        // Frame and Panel
        JFrame frame = new JFrame("My UI Frame");
        frame.getContentPane().setBackground(Color.BLACK);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        JPanel panelTitle = new JPanel(new FlowLayout());
        JPanel panelOne = new JPanel(new GridLayout(2, 2, 1, 1));
        JPanel panelTwo = new JPanel(new FlowLayout());
        JButton button = new JButton("EVALUATE");


        // Setting the panel sizes
        panelTitle.setBounds(10, 10, 380, 40);
        panelOne.setBounds(40, 60, 300, 80);
        panelTwo.setBounds(10, 200, 380, 40);


        // Color for visualization only
        button.setForeground(Color.pink);
        button.setBackground(Color.darkGray);
        panelTitle.setBackground(Color.BLACK);
        panelOne.setBackground(Color.BLACK);
        panelTwo.setBackground(Color.BLACK);


        JLabel labelOne, labelTwo, labelTitle;

        final JTextField tFieldOne, tFieldTwo;
        tFieldOne = new JTextField(20);
        tFieldOne.setPreferredSize(new Dimension(80, 50));
        tFieldTwo = new JTextField(20);
        tFieldTwo.setPreferredSize(new Dimension(80, 20));

        labelTitle = new JLabel("Guess My Age:", JLabel.CENTER);
        labelOne = new JLabel("    Current Year:");
        labelTwo = new JLabel("    Birth Year:");


        labelOne.setForeground(Color.pink);
        labelTitle.setForeground(Color.pink);
        labelTwo.setForeground(Color.PINK);


        labelTitle.setBounds(10, 10, 90, 20);
        labelOne.setBounds(10, 10, 90, 20);
        tFieldOne.setBounds(5, 5, 100, 100);
        labelTwo.setBounds(10, 10, 90, 20);
        tFieldTwo.setBounds(5, 5, 100, 100);

        panelTitle.add(labelTitle);

        panelOne.add(labelOne);
        panelOne.add(tFieldOne);
        panelOne.add(labelTwo);
        panelOne.add(tFieldTwo);

        tFieldOne.setBackground(Color.pink);
        tFieldTwo.setBackground(Color.pink);

        button.setBounds(10, 10, 90, 20);
        button.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                //System.out.println("Button Clicked");
                //System.out.println(tFieldOne.getText());
                //System.out.println(tFieldTwo.getText());
                int result = computeValue(tFieldOne.getText(), tFieldTwo.getText());
                //System.out.println(result);
                displayMessage (String.valueOf(result));
            }
        });

        panelTwo.add(button);

        frame.add(panelTitle);
        frame.add(panelOne);
        frame.add(panelTwo);

        // make the frame half the height and width
        Dimension screenSize = Toolkit.getDefaultToolkit().getScreenSize();
        int height = screenSize.height;
        int width = screenSize.width;
        // set size to half of screen
        //frame.setSize(width/2, height/2);

        frame.setSize(400, 300);
        frame.setResizable(false);
        frame.setLayout(null);

        // center the jframe on screen
        frame.setLocationRelativeTo(null);
        frame.setVisible(true);
    }

    public static int computeValue(String value1, String value2) {
        int val1 = Integer.parseInt(value1);
        int val2 = Integer.parseInt(value2);
        int sum = val1 - val2;
        return sum;

    }

    public static void displayMessage(String message){
        JOptionPane.showMessageDialog( null, message, "Result" , JOptionPane.INFORMATION_MESSAGE );
    }
}