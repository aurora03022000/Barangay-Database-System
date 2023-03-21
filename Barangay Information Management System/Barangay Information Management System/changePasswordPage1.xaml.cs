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
    /// Interaction logic for changePasswordPage1.xaml
    /// </summary>
    public partial class changePasswordPage1 : Window
    {
        SqlConnection connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");

        String username, accountID;

        public changePasswordPage1()
        {
            InitializeComponent();

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
                accountID = getCurrentAccountInfoDR.GetValue(0).ToString();
                username = getCurrentAccountInfoDR.GetValue(1).ToString();
            }
            getCurrentAccountInfoDR.Close();
            getCurrentAccountIDConnection.Close();

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

            else if (confirm_passwordbox.Password == "")
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
                        changeAccountPasswordCMD.Parameters.AddWithValue("@accountID", accountID);
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
