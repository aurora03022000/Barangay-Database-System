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
    /// Interaction logic for changePasswordPage.xaml
    /// </summary>
    public partial class changePasswordPage : Window
    {
        SqlConnection connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");

        String selectedID;
        int selectedIDInteger;

        String username;

        public changePasswordPage()
        {
            InitializeComponent();

            //getting selectedid of account
            SqlConnection getSelectedAccountIDConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getSelectedAccountIDConnection.Open();
            SqlCommand getSelectedAccountIDCMD = new SqlCommand();
            getSelectedAccountIDCMD.Connection = getSelectedAccountIDConnection;
            getSelectedAccountIDCMD.CommandText = "SELECT * FROM selected_account WHERE selected_account_id = 1";
            getSelectedAccountIDCMD.ExecuteNonQuery();

            SqlDataReader getSelectedAccountIDDR = getSelectedAccountIDCMD.ExecuteReader();
            while (getSelectedAccountIDDR.Read())
            {
                selectedID = getSelectedAccountIDDR.GetValue(1).ToString();
                selectedIDInteger = Int32.Parse(selectedID);
            }
            getSelectedAccountIDDR.Close();
            getSelectedAccountIDConnection.Close();

            //getting the info of selected id
            SqlConnection getSelectedAccountInformationConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getSelectedAccountInformationConnection.Open();
            SqlCommand getSelectedAccountInformationCMD = new SqlCommand();
            getSelectedAccountInformationCMD.Connection = getSelectedAccountInformationConnection;
            getSelectedAccountInformationCMD.CommandText = "SELECT * FROM accounts WHERE id = @accountID";
            getSelectedAccountInformationCMD.Parameters.AddWithValue("@accountID", selectedID);
            getSelectedAccountInformationCMD.ExecuteNonQuery();

            SqlDataReader getSelectedAccountInformationDR = getSelectedAccountInformationCMD.ExecuteReader();
            while (getSelectedAccountInformationDR.Read())
            {
                username = getSelectedAccountInformationDR.GetValue(1).ToString();
            }
            getSelectedAccountInformationDR.Close();
            getSelectedAccountInformationConnection.Close();

            username_textbox.Text = username;
        }

        private void Change_password_btn_Click(object sender, RoutedEventArgs e)
        {
            if (new_passwordbox.Password == "")
            {
                MessageBox.Show(this, "Password field should not be empty", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);
                new_passwordbox.BorderBrush = Brushes.Red;
                new_passwordbox.BorderThickness = new Thickness(2);
                new_passwordbox.Focus();
                confirm_passwordbox.BorderBrush = Brushes.Red;
                confirm_passwordbox.BorderThickness = new Thickness(2);
            }

            else if(confirm_passwordbox.Password == "")
            {
                MessageBox.Show(this, "Confirm Password field should not be empty", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);
                confirm_passwordbox.BorderBrush = Brushes.Red;
                confirm_passwordbox.BorderThickness = new Thickness(2);
                confirm_passwordbox.Focus();
            }

            else if (new_passwordbox.Password.Length < 6)
            {
                MessageBox.Show(this, "Password must have atleast 6 characters in length", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                new_passwordbox.BorderBrush = Brushes.Red;
                new_passwordbox.BorderThickness = new Thickness(2);
                new_passwordbox.Password = "";
                new_passwordbox.Focus();
                confirm_passwordbox.BorderBrush = Brushes.Red;
                confirm_passwordbox.BorderThickness = new Thickness(2);
                confirm_passwordbox.Password = "";
            }

            else if (new_passwordbox.Password != confirm_passwordbox.Password)
            {
                MessageBox.Show(this, "Password did not matched!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                new_passwordbox.BorderBrush = Brushes.Red;
                new_passwordbox.BorderThickness = new Thickness(2);
                new_passwordbox.Password = "";
                new_passwordbox.Focus();
                confirm_passwordbox.BorderBrush = Brushes.Red;
                confirm_passwordbox.BorderThickness = new Thickness(2);
                confirm_passwordbox.Password = "";
            }

            else
            {
                MessageBoxResult resultChangePassword = MessageBox.Show("Do you want to change the password of this account?", "Confirmation", MessageBoxButton.OKCancel);

                switch (resultChangePassword)
                {
                    case MessageBoxResult.OK:
                        //change password account
                        connection.Open();
                        SqlCommand changeAccountPasswordCMD = new SqlCommand();
                        changeAccountPasswordCMD.Connection = connection;
                        changeAccountPasswordCMD.CommandText = "UPDATE accounts SET password = @password WHERE id=@accountID";
                        changeAccountPasswordCMD.Parameters.AddWithValue("@accountID", selectedID);
                        changeAccountPasswordCMD.Parameters.AddWithValue("@password", new_passwordbox.Password);
                        SqlDataAdapter changeAccountPasswordDA = new SqlDataAdapter(changeAccountPasswordCMD);
                        DataTable changeAccountPasswordDT = new DataTable();
                        changeAccountPasswordDA.Fill(changeAccountPasswordDT);
                        connection.Close();

                        MessageBox.Show("Account Password had been changed successfully!");

                        new_passwordbox.BorderBrush = Brushes.DarkGray;
                        new_passwordbox.BorderThickness = new Thickness(1);
                        new_passwordbox.Password = "";
                        new_passwordbox.Focus();
                        confirm_passwordbox.BorderBrush = Brushes.DarkGray;
                        confirm_passwordbox.BorderThickness = new Thickness(1);
                        confirm_passwordbox.Password = "";
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
