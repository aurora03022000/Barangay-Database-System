using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using System.Data;
using System.Data.SqlClient;
using System.Configuration;
using System.Collections.ObjectModel;
using System.Text.RegularExpressions;
using MySql.Data.MySqlClient;

namespace Barangay_Information_Management_System
{
    /// <summary>
    /// Interaction logic for registerAccountPage.xaml
    /// </summary>
    public partial class registerAccountPage : Window
    {
        SqlConnection connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");

        String currentAccoutnID;
        int currentAccoutnIDinteger;
        int count;

        public registerAccountPage()
        {
            InitializeComponent();

            /*//getting current Account
            SqlConnection getCurrentAccountIDConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getCurrentAccountIDConnection.Open();
            SqlCommand getCurrentAccountIDCMD = new SqlCommand();
            getCurrentAccountIDCMD.Connection = getCurrentAccountIDConnection;
            getCurrentAccountIDCMD.CommandText = "SELECT * FROM currentAccount WHERE id = 1";
            getCurrentAccountIDCMD.ExecuteNonQuery();

            SqlDataReader getCurrentAccountIDDR = getCurrentAccountIDCMD.ExecuteReader();
            while (getCurrentAccountIDDR.Read())
            {
                currentAccoutnID = getCurrentAccountIDDR.GetValue(0).ToString();
                currentAccoutnIDinteger = Int32.Parse(currentAccoutnID);
            }
            getCurrentAccountIDDR.Close();
            getCurrentAccountIDConnection.Close();*/
        }

        private void number_textbox(object sender, TextCompositionEventArgs e)
        {
            Regex regex = new Regex("[^0-9]+");
            e.Handled = regex.IsMatch(e.Text);
        }

        private void Register_account_btn_Click(object sender, RoutedEventArgs e)
        {
            if (username_textbox.Text == "" && password_textbox.Password == "" && purok_textbox.Text == "")
            {
                MessageBox.Show(this, "Account fields should not be empty", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);
                username_textbox.BorderBrush = Brushes.Red;
                username_textbox.BorderThickness = new Thickness(2);
                username_textbox.Focus();

                password_textbox.BorderBrush = Brushes.Red;
                password_textbox.BorderThickness = new Thickness(2);

                purok_textbox.BorderBrush = Brushes.Red;
                purok_textbox.BorderThickness = new Thickness(2);
            }

            else if(username_textbox.Text == "")
            {
                MessageBox.Show(this, "Account fields should not be empty", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);
                username_textbox.BorderBrush = Brushes.Red;
                username_textbox.BorderThickness = new Thickness(2);
                username_textbox.Focus();

                password_textbox.BorderBrush = Brushes.Red;
                password_textbox.BorderThickness = new Thickness(2);
            }

            else if(username_textbox.Text.Length < 6)
            {
                MessageBox.Show(this, "Username must have atleast 6 characters in length", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                username_textbox.BorderBrush = Brushes.Red;
                username_textbox.BorderThickness = new Thickness(2);
                username_textbox.Text = "";
                username_textbox.Focus();
            }


            else if (password_textbox.Password == "")
            {
                MessageBox.Show(this, "Account fields should not be empty", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);
                username_textbox.BorderBrush = Brushes.DarkGray;
                username_textbox.BorderThickness = new Thickness(1);

                password_textbox.BorderBrush = Brushes.Red;
                password_textbox.BorderThickness = new Thickness(2);
                password_textbox.Focus();
            }

            
            else if(password_textbox.Password.Length < 6)
            {
                MessageBox.Show(this, "Password must have atleast 6 characters in length", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                username_textbox.BorderBrush = Brushes.DarkGray;
                username_textbox.BorderThickness = new Thickness(1);

                password_textbox.BorderBrush = Brushes.Red;
                password_textbox.BorderThickness = new Thickness(2);
                password_textbox.Password = "";
                password_textbox.Focus();
            }

            else if(purok_textbox.Text == "") {
                MessageBox.Show(this, "Purok field should not be empty", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                username_textbox.BorderBrush = Brushes.DarkGray;
                username_textbox.BorderThickness = new Thickness(1);

                password_textbox.BorderBrush = Brushes.DarkGray;
                password_textbox.BorderThickness = new Thickness(1);

                purok_textbox.BorderBrush = Brushes.Red;
                purok_textbox.BorderThickness = new Thickness(2);
                purok_textbox.Text = "";
                purok_textbox.Focus();
            }

            else
            {

                MessageBoxResult resultRegister = MessageBox.Show("Do you want to register this account?", "Confirmation", MessageBoxButton.OKCancel);

                switch (resultRegister)
                {
                    case MessageBoxResult.OK:

                        connection.Open();
                        string checkDuplicateUsername = "SELECT COUNT(*) FROM accounts WHERE username = @username";
                        SqlCommand checkDuplicateUsernameCMD = new SqlCommand(checkDuplicateUsername, connection);
                        checkDuplicateUsernameCMD.Parameters.AddWithValue("@username", username_textbox.Text);
                        checkDuplicateUsernameCMD.ExecuteNonQuery();
                        count = Convert.ToInt32(checkDuplicateUsernameCMD.ExecuteScalar());
                        SqlDataAdapter checkDuplicateUsernameDA = new SqlDataAdapter(checkDuplicateUsernameCMD);
                        DataTable checkDuplicateUsernameDT = new DataTable("accounts");
                        checkDuplicateUsernameDA.Fill(checkDuplicateUsernameDT);
                        checkDuplicateUsernameDA.Update(checkDuplicateUsernameDT);
                        connection.Close();

                        if(count > 0)
                        {
                            MessageBox.Show(this, "Username already exist!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                            username_textbox.BorderBrush = Brushes.Red;
                            username_textbox.BorderThickness = new Thickness(2);
                            username_textbox.Text = "";
                            username_textbox.Focus();
                        }

                        else
                        {
                            connection.Open();
                            SqlCommand addAccountCMD = new SqlCommand();
                            addAccountCMD.Connection = connection;
                            addAccountCMD.CommandText = "INSERT INTO accounts(username, password, full_name, first_name, middle_name, last_name, barangay, purok, phone_number) VALUES(@username, @password, @firstName + ' ' + @middleName + ' ' + @lastName, @firstName, @middleName, @lastName, 'Santa Cruz', @purok, @phoneNumber)";
                            addAccountCMD.Parameters.AddWithValue("@username", username_textbox.Text);
                            addAccountCMD.Parameters.AddWithValue("@password", password_textbox.Password);
                            addAccountCMD.Parameters.AddWithValue("@firstName", first_name_textbox.Text);
                            addAccountCMD.Parameters.AddWithValue("@middleName", middle_name_textbox.Text);
                            addAccountCMD.Parameters.AddWithValue("@lastName", last_name_textbox.Text);
                            addAccountCMD.Parameters.AddWithValue("@purok", purok_textbox.Text);
                            addAccountCMD.Parameters.AddWithValue("@phoneNumber", phone_number_textbox.Text);
                            SqlDataAdapter addAccountDA = new SqlDataAdapter(addAccountCMD);
                            DataTable addAccountDT = new DataTable();
                            addAccountDA.Fill(addAccountDT);
                            connection.Close();

                            MessageBox.Show("Account registered successfully!");

                            username_textbox.BorderBrush = Brushes.DarkGray;
                            username_textbox.BorderThickness = new Thickness(1);
                            username_textbox.Text = "";

                            password_textbox.BorderBrush = Brushes.DarkGray;
                            password_textbox.BorderThickness = new Thickness(1);
                            password_textbox.Password = "";

                            first_name_textbox.BorderBrush = Brushes.DarkGray;
                            first_name_textbox.BorderThickness = new Thickness(1);
                            first_name_textbox.Text = "";

                            middle_name_textbox.BorderBrush = Brushes.DarkGray;
                            middle_name_textbox.BorderThickness = new Thickness(1);
                            middle_name_textbox.Text = "";

                            last_name_textbox.BorderBrush = Brushes.DarkGray;
                            last_name_textbox.BorderThickness = new Thickness(1);
                            last_name_textbox.Text = "";

                            purok_textbox.BorderBrush = Brushes.DarkGray;
                            purok_textbox.BorderThickness = new Thickness(1);
                            purok_textbox.Text = "";

                            phone_number_textbox.BorderBrush = Brushes.DarkGray;
                            phone_number_textbox.BorderThickness = new Thickness(1);
                            phone_number_textbox.Text = "";
                        }  
                        break;

                    case MessageBoxResult.Cancel:
                        break;

                    default:
                        break;
                }
                
            }
        }
    }
}
