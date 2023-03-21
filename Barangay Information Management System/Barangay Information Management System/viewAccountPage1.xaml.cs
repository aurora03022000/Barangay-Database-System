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
    /// Interaction logic for viewAccountPage1.xaml
    /// </summary>
    public partial class viewAccountPage1 : Window
    {
        SqlConnection connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");

        String username, password, firstName, middleName, lastName, barangay, purok, phoneNumber;
        String accoutnID;

        public viewAccountPage1()
        {
            InitializeComponent();

            MaxHeight = SystemParameters.MaximizedPrimaryScreenHeight;
            MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

            //getting username of current Account
            SqlConnection getCurrentAccountIDConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getCurrentAccountIDConnection.Open();
            SqlCommand getCurrentAccountIDCMD = new SqlCommand();
            getCurrentAccountIDCMD.Connection = getCurrentAccountIDConnection;
            getCurrentAccountIDCMD.CommandText = "SELECT * FROM currentAccount WHERE id = 1";
            getCurrentAccountIDCMD.ExecuteNonQuery();

            SqlDataReader getCurrentAccountIDDR = getCurrentAccountIDCMD.ExecuteReader();
            while (getCurrentAccountIDDR.Read())
            {
                username = getCurrentAccountIDDR.GetValue(1).ToString();
            }
            getCurrentAccountIDDR.Close();
            getCurrentAccountIDConnection.Close();

            //getting info of current Account
            SqlConnection getCurrentAccountInfoConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getCurrentAccountInfoConnection.Open();
            SqlCommand getCurrentAccountInfoCMD = new SqlCommand();
            getCurrentAccountInfoCMD.Connection = getCurrentAccountInfoConnection;
            getCurrentAccountInfoCMD.CommandText = "SELECT * FROM accounts WHERE username = @username";
            getCurrentAccountInfoCMD.Parameters.AddWithValue("@username", username);
            getCurrentAccountInfoCMD.ExecuteNonQuery();

            SqlDataReader getCurrentAccountInfoDR = getCurrentAccountInfoCMD.ExecuteReader();
            while (getCurrentAccountInfoDR.Read())
            {
                accoutnID = getCurrentAccountInfoDR.GetValue(0).ToString();
                username = getCurrentAccountInfoDR.GetValue(1).ToString();
                password = getCurrentAccountInfoDR.GetValue(2).ToString();
                firstName = getCurrentAccountInfoDR.GetValue(4).ToString();
                middleName = getCurrentAccountInfoDR.GetValue(5).ToString();
                lastName = getCurrentAccountInfoDR.GetValue(6).ToString();
                barangay = getCurrentAccountInfoDR.GetValue(7).ToString();
                purok = getCurrentAccountInfoDR.GetValue(8).ToString();
                phoneNumber = getCurrentAccountInfoDR.GetValue(9).ToString();
            }
            getCurrentAccountInfoDR.Close();
            getCurrentAccountIDConnection.Close();

            username_textbox.Text = username;
            password_textbox.Password = password;
            first_name_textbox.Text = firstName;
            middle_name_textbox.Text = middleName;
            last_name_textbox.Text = lastName;
            barangay_textbox.Text = barangay;
            purok_textbox.Text = purok;
            phone_number_textbox.Text = phoneNumber;
        }

        private void number_textbox(object sender, TextCompositionEventArgs e)
        {
            Regex regex = new Regex("[^0-9]+");
            e.Handled = regex.IsMatch(e.Text);
        }

        private void Edit_data_btn_Click(object sender, RoutedEventArgs e)
        {
            edit_account_btn.Visibility = Visibility.Hidden;
            update_data_account_btn.Visibility = Visibility.Visible;
            cancel_account_btn.Visibility = Visibility.Visible;
            requiredPurok.Visibility = Visibility.Visible;

            first_name_textbox.IsReadOnly = false;
            middle_name_textbox.IsReadOnly = false;
            last_name_textbox.IsReadOnly = false;
            purok_textbox.IsReadOnly = false;
            phone_number_textbox.IsReadOnly = false;

            first_name_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            first_name_textbox.BorderThickness = new Thickness(2);
            middle_name_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            middle_name_textbox.BorderThickness = new Thickness(2);
            last_name_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            last_name_textbox.BorderThickness = new Thickness(2);
            purok_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            purok_textbox.BorderThickness = new Thickness(2);
            phone_number_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            phone_number_textbox.BorderThickness = new Thickness(2);
        }

        private void cancel_btn_Click(object sender, RoutedEventArgs e)
        {
            edit_account_btn.Visibility = Visibility.Visible;
            update_data_account_btn.Visibility = Visibility.Hidden;
            cancel_account_btn.Visibility = Visibility.Hidden;
            requiredPurok.Visibility = Visibility.Hidden;

            first_name_textbox.IsReadOnly = true;
            middle_name_textbox.IsReadOnly = true;
            last_name_textbox.IsReadOnly = true;
            purok_textbox.IsReadOnly = true;
            phone_number_textbox.IsReadOnly = true;

            first_name_textbox.BorderBrush = Brushes.DarkGray;
            first_name_textbox.BorderThickness = new Thickness(1);
            middle_name_textbox.BorderBrush = Brushes.DarkGray;
            middle_name_textbox.BorderThickness = new Thickness(1);
            last_name_textbox.BorderBrush = Brushes.DarkGray;
            last_name_textbox.BorderThickness = new Thickness(1);
            purok_textbox.BorderBrush = Brushes.DarkGray;
            purok_textbox.BorderThickness = new Thickness(1);
            phone_number_textbox.BorderBrush = Brushes.DarkGray;
            phone_number_textbox.BorderThickness = new Thickness(1);

            first_name_textbox.Text = firstName;
            middle_name_textbox.Text = middleName;
            last_name_textbox.Text = lastName;
            barangay_textbox.Text = barangay;
            purok_textbox.Text = purok;
            phone_number_textbox.Text = phoneNumber;
        }

        private void update_data_purok_btn_Click(object sender, RoutedEventArgs e)
        {
            if (purok_textbox.Text == "")
            {
                MessageBox.Show(this, "Purok field should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);
                purok_textbox.BorderBrush = Brushes.Red;
                purok_textbox.BorderThickness = new Thickness(2);
                purok_textbox.Focus();

            }

            else
            {
                MessageBoxResult resultAccount = MessageBox.Show("Do you want to update this account?", "Confirmation", MessageBoxButton.OKCancel);

                switch (resultAccount)
                {
                    case MessageBoxResult.OK:
                        //updating account
                        connection.Open();
                        SqlCommand updateAccountCMD = new SqlCommand();
                        updateAccountCMD.Connection = connection;
                        updateAccountCMD.CommandText = "UPDATE accounts SET full_name = @firstName + ' ' + @middleName + ' ' + @lastName, first_name = @firstName, middle_name = @middleName, last_name = @lastName, purok = @purok, phone_number = @phoneNumber WHERE id=@accountID";
                        updateAccountCMD.Parameters.AddWithValue("@accountID", accoutnID);
                        updateAccountCMD.Parameters.AddWithValue("@firstName", first_name_textbox.Text);
                        updateAccountCMD.Parameters.AddWithValue("@middleName", middle_name_textbox.Text);
                        updateAccountCMD.Parameters.AddWithValue("@lastName", last_name_textbox.Text);
                        updateAccountCMD.Parameters.AddWithValue("@purok", purok_textbox.Text);
                        updateAccountCMD.Parameters.AddWithValue("@phoneNumber", phone_number_textbox.Text);
                        SqlDataAdapter updateAccountDA = new SqlDataAdapter(updateAccountCMD);
                        DataTable updateAccountDT = new DataTable();
                        updateAccountDA.Fill(updateAccountDT);
                        connection.Close();

                        MessageBox.Show("Account Information had been updated successfully!");
                        break;

                    case MessageBoxResult.Cancel:
                        break;

                    default:
                        break;
                }

                edit_account_btn.Visibility = Visibility.Visible;
                update_data_account_btn.Visibility = Visibility.Hidden;
                cancel_account_btn.Visibility = Visibility.Hidden;
                requiredPurok.Visibility = Visibility.Hidden;

                first_name_textbox.IsReadOnly = true;
                middle_name_textbox.IsReadOnly = true;
                last_name_textbox.IsReadOnly = true;
                purok_textbox.IsReadOnly = true;
                phone_number_textbox.IsReadOnly = true;

                first_name_textbox.BorderBrush = Brushes.DarkGray;
                first_name_textbox.BorderThickness = new Thickness(1);
                middle_name_textbox.BorderBrush = Brushes.DarkGray;
                middle_name_textbox.BorderThickness = new Thickness(1);
                last_name_textbox.BorderBrush = Brushes.DarkGray;
                last_name_textbox.BorderThickness = new Thickness(1);
                purok_textbox.BorderBrush = Brushes.DarkGray;
                purok_textbox.BorderThickness = new Thickness(1);
                phone_number_textbox.BorderBrush = Brushes.DarkGray;
                phone_number_textbox.BorderThickness = new Thickness(1);

                //getting the info of selected id
                SqlConnection getSelectedAccountInformationConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                getSelectedAccountInformationConnection.Open();
                SqlCommand getSelectedAccountInformationCMD = new SqlCommand();
                getSelectedAccountInformationCMD.Connection = getSelectedAccountInformationConnection;
                getSelectedAccountInformationCMD.CommandText = "SELECT * FROM accounts WHERE id = @accountID";
                getSelectedAccountInformationCMD.Parameters.AddWithValue("@accountID", accoutnID);
                getSelectedAccountInformationCMD.ExecuteNonQuery();

                SqlDataReader getSelectedAccountInformationDR = getSelectedAccountInformationCMD.ExecuteReader();
                while (getSelectedAccountInformationDR.Read())
                {
                    username = getSelectedAccountInformationDR.GetValue(1).ToString();
                    firstName = getSelectedAccountInformationDR.GetValue(4).ToString();
                    middleName = getSelectedAccountInformationDR.GetValue(5).ToString();
                    lastName = getSelectedAccountInformationDR.GetValue(6).ToString();
                    barangay = getSelectedAccountInformationDR.GetValue(7).ToString();
                    purok = getSelectedAccountInformationDR.GetValue(8).ToString();
                    phoneNumber = getSelectedAccountInformationDR.GetValue(9).ToString();
                }
                getSelectedAccountInformationDR.Close();
                getSelectedAccountInformationConnection.Close();

                username_textbox.Text = username;
                first_name_textbox.Text = firstName;
                middle_name_textbox.Text = middleName;
                last_name_textbox.Text = lastName;
                barangay_textbox.Text = barangay;
                purok_textbox.Text = purok;
                phone_number_textbox.Text = phoneNumber;
            }
        }
    }
}
