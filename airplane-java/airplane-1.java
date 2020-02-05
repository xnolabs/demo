

File Name: BookingSystem.java

File Type: Java

User ID: W1710551



package bookingsystem;

import java.util.*;

import java.io.*;



/**

 *

 * @author w1710551

 */

public class BookingSystem {

    static boolean menuOpen = true; 

    static final int SEATING_CAPACITY = 12;

    static Scanner input = new Scanner(System.in);

    static int seatNumber;

    static String passengerName;

    

    // Creates an array of strings + receives length from Main Class (Booking System)

    static String[] airplane = new String[SEATING_CAPACITY];

    

    /**

     * @param args the command line arguments

     * @throws java.io.IOException

     */

    public static void main(String[] args)  throws IOException{

       char menuOption;

       

       Arrays.fill(airplane, 1, 12, "e"); 

       airplane[0] = "Pilot";

       

       // Converts Non-Static Method into Static Method from Class Name "airplane" - Called "Option" for relation to Project Purposes

       airplane option = new airplane();

       

       do{ // Continuous Menu Loop

           menu(); // Display Menu Method

           menuOption = input.next().charAt(0); //Accepts user input for a single Character Only  

           Character.toUpperCase(menuOption); //Converts user input to uppercase character for menu option case-sensivity

           switch(menuOption){

               case 'E': // Display Empty Seats              

                    option.emptySeats();

                    break;

               // Add Passenger to Seat  

                case 'A':

                    option.addPassenger();

                    break;

               // View all Seats  

                case 'V':

                    option.allSeats();

                    break;                    

               // Delete Passenger from given seat number    

                case 'D':   

                    option.deletePassenger();

                    break;

               // Find the seat of a Passenger using their name    

                case 'F':   

                    option.findPassenger();

                    break;

     

                case 'S': // Store Program Data into a text file  

                    option.saveData();

                    break;

                case 'L':  

                    break;   

                case 'O': // Method to Bubble Sort Passenger Da   

                    option.sortData();

                    break;

               // Quit Program    

                case 'Q':

                   System.out.println("Program will Exit");

                   // Terminates Program

                   menuOpen = false; //Menu Loop Terminated as Condition is returned as False

                   break;

               default:

                   System.out.println("Invalid Option."); // Displayed if Case input Requirements not met

           }

         // Continues Loop of menu() Method while True - Condition is stopped when Case 'Q' is run as this changes boolean value to false

       } while(menuOpen);

    }

    

    public static void menu() {

        System.out.println("What would you like to do? (Enter [CAPITALS ONLY] Character): \n");       

        System.out.println("E:      Display ALL Empty Seats"); // DONE

        System.out.println("A:      Add New Passenger"); // DONE

        System.out.println("V:      Display ALL Seats"); // DONE  

        System.out.println("D:      Delete Passenger from Seat"); // DONE

        System.out.println("F:      Find the seat of a passengers given name"); // DONE

        System.out.println("S:      Store program data into file"); // DONE

        System.out.println("L:      Load program data from file"); //ATTEMPTED NOT COMPLETED

        System.out.println("O:      View seats ordered alphabetically by name"); //ATTEMPTED NOT COMPLETED

        System.out.println("Q:      Exit Program"); // DONE

    }

    

}





File Name: airplane.java

File Type: Java

User ID: W1710551



/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 */

package bookingsystem;

import java.util.*;

import java.util.logging.Level;

import java.util.logging.Logger;

import java.io.*;







/**

 *

 * @author w1710551

 */



// This Class is a Sub-Class of BookingSystem - Creates Airplane

public class airplane extends BookingSystem {

    

    /**

     * Method for Airplane initial layout

     */

    public void allSeats(){

        // Loop to view all Seats stored in Array (Airplane Object)

        for(int i = 0; i < airplane.length; i++) {

            System.out.println("Seat " + i + " is " + airplane[i]);

        }

    }

    

    /**

     * Method for viewing ALL empty seats

     */

    public void emptySeats(){

        // Loop to check for Empty Seats in Array (Airplane Object)

        for(int i = 0; i < airplane.length; i++) {

            if("e".equals(airplane[i])){

                System.out.println("Seat " + i + " is " + airplane[i]);

            }

        }

    }

    

    /**

     * Method to Add New Passenger to Empty Seats Only

     */     

    public void addPassenger(){

        while (seatNumber < airplane.length) {

            System.out.println("Enter Seat Number (0-11)");

            seatNumber = input.nextInt();

            if(airplane[seatNumber].equals("e")) {

                System.out.println("Enter name for Seat " + seatNumber + ":" );

                passengerName = input.next();  

                airplane[seatNumber] = passengerName;

                break;

            }

            else {

                System.out.println("This seat is occupied, please try another seat");

            }         

        }       

    }

    

    public void deletePassenger() {

        while (seatNumber < airplane.length) {

            System.out.println("Enter a Seat Number for a Passenger to Delete (0-11): ");

            seatNumber = input.nextInt();

            if (airplane[seatNumber].equals("Pilot")) {

                System.out.println("You cannot remove the Pilot, please select another Passenger to remove");

                break;

            }

            if(!"e".equals(airplane[seatNumber])) {

                System.out.println("You have removed " + airplane[seatNumber] + " from Seat " + seatNumber);

                airplane[seatNumber] = "e";

                break;

            }          

            if (airplane[seatNumber].equals("e")) {

                System.out.println("There is no Passenger in this seat, please choose another seat");

                break;

            }

            else {

                System.out.println("");

            }

        }   

    }

    

    public void findPassenger() {

        while (seatNumber < airplane.length) {

            System.out.println("Enter Passenger Name:");

            passengerName = input.next();

            if (passengerName.equals(airplane[seatNumber])){

                System.out.println("Passenger Name: " + passengerName + " is in seat " + seatNumber);

                break;

            }

            else {

                System.out.println("There is no Passenger in this seat, please try again!");

                break;

            }

        }

    }

    

    public void saveData(){

        try {

            try (FileWriter saveNewData = new FileWriter("airplaneData.txt")) {

                for(int i = 0; i < airplane.length; i++) { // For Each Seat Position in Airplane Array by Index Value

                    saveNewData.write(i + " " + airplane[i] + "\r\n"); // Write to text file seat position + passenger name as readable text file

                    saveNewData.flush();

                }

            }

        } catch (IOException ex) {

            Logger.getLogger(airplane.class.getName()).log(Level.SEVERE, null, ex);

        }

        System.out.println("All Data saved to Filename 'airplaneData.txt' "); // Output this statement if Data has been saved to text file

    }

    

    public void loadData() {

        try {

            Scanner loadData = new Scanner(new File("airplaneData.txt"));

            while(loadData.hasNextLine()){

                String line = loadData.nextLine();

                if (line.length() == 0) {

                    continue;

                }

                if (line.length() > 0) {

                    

                    // Pass each Line of text file through this method as a Parameter       

                    while (seatNumber < SEATING_CAPACITY) {

                        if (isStringInt(line) == true) {

                            airplane[0] = "Pilot";

                        }

                        for (int i = 1; i < SEATING_CAPACITY; i++) {

                            i = seatNumber++;

                            passengerName = line.substring(2, -1);

                            airplane[i] = passengerName;

                            System.out.println("Seat " + i + "is occupied by: " + airplane[i]);

                        }

                    }    

                }

            } 

            System.out.println("Data File Successfully loaded.");

        }

        catch (FileNotFoundException ex) {

            Logger.getLogger(airplane.class.getName()).log(Level.SEVERE, null, ex);

        }  

    }

    

    // Check if there is a Integer Value Stored in text file

    public boolean isStringInt(String s) {

        try {

            Integer.parseInt(s);

            return true;

        }

        catch (NumberFormatException ex) {

            return false;

        }

    }

    

    public void sortData() {

        bubbleSort(airplane, seatNumber);

        for (int i = 0; i < airplane.length; i++) {

            System.out.println("Seat " + seatNumber + " is " + airplane[i]);

        }

    }

    

    public static void bubbleSort(String plane[], int index) {

        String temp;

        for (index = 0;  index < airplane.length;  index++ ) {

            for (int j = 0; j < airplane.length + 1; j++) {

                if (plane[index].compareToIgnoreCase(plane[j]) > 0 ) {  // ascending sort

                    temp = plane[index];

                    plane[index] = plane[j];  // swapping

                    plane[j] = temp; 

                }

            }

        }

    }

}    



