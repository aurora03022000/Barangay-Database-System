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
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Data;
using System.Data.SqlClient;

namespace Barangay_Information_Management_System
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class loginPage : Window
    {
        public loginPage()
        {
            InitializeComponent();
        }

        SqlConnection connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");


        private void Button_Click(object sender, RoutedEventArgs e)
        {
            //Verifying Inputs of user
            string verifyUser = "SELECT * FROM accounts WHERE username=@username and password=@password";
            connection.Open();
            SqlCommand verifyUsercmd = new SqlCommand(verifyUser, connection);
            verifyUsercmd.Parameters.AddWithValue("@username", usernameTextbox.Text);
            verifyUsercmd.Parameters.AddWithValue("@password", passwordTextbox.Password);
            SqlDataAdapter verifyUserda = new SqlDataAdapter(verifyUsercmd);
            DataTable verifyUserdt = new DataTable();
            verifyUserda.Fill(verifyUserdt);
            connection.Close();

            if (verifyUserdt.Rows.Count > 0)
            {
                string currentAccount = "UPDATE currentAccount SET username=@username, password=@password WHERE id='1'";
                connection.Open();
                SqlCommand currentAccountcmd = new SqlCommand(currentAccount, connection);
                currentAccountcmd.Parameters.AddWithValue("@username", usernameTextbox.Text.ToLower());
                currentAccountcmd.Parameters.AddWithValue("@password", passwordTextbox.Password);
                SqlDataAdapter currentAccountda = new SqlDataAdapter(currentAccountcmd);
                DataTable currentAccountdt = new DataTable();
                currentAccountda.Fill(currentAccountdt);
                connection.Close();

                menuPage menuPageWindow = new menuPage();
                menuPageWindow.Show();
                this.Close();

            }

            else {
                errorLabel.Visibility = Visibility.Visible;
                usernameTextbox.Text = null;
                passwordTextbox.Password = null;
                usernameTextbox.BorderBrush = Brushes.Red;
                passwordTextbox.BorderBrush = Brushes.Red;
            }
        }
    }
}
